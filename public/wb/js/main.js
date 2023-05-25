$(function () {
  // Create ad page img uploader
  function checkLengthFun() {
    let uploadedImgs = document.querySelectorAll(".uploaded-img"),
      placeholder = $("#placeholder"),
      inputDiv = $(".input-div");
    if ($(uploadedImgs).length >= 1) {
      $(placeholder).css("cssText", "display: none");
      $(inputDiv).addClass("more");
    } else if ($(uploadedImgs).length === 0) {
      $(placeholder).css("cssText", "display: flex");
      $(inputDiv).removeClass("more");
    }
  }
  checkLengthFun();

  if (window.File && window.FileList && window.FileReader) {
    $("#files").on("change", function (e) {
      var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i];
        var fileReader = new FileReader();
        fileReader.onload = function (e) {
          var file = e.target;

          $(`<div class="uploaded-img col-md-3 col-6 mb-3">
                        <div class="image-cover customSmHeight">
                            <img class="imageThumb" src="${e.target.result}" title=" ${file.name}"/>
                            <button class="remove" type="button"><i class="fal fa-times"></i></button>
                        </div>
                    </div>`).appendTo("#uploadedFiles");
          $(".remove").click(function () {
            $(this).parent().parent(".uploaded-img").remove();
            checkLengthFun();
          });
          checkLengthFun();
          customSmHeightFun();
        };
        fileReader.readAsDataURL(f);
      }
      customSmHeightFun();
    });
  } else {
    alert("Your browser doesn't support to File API");
  }
});

$(function () {
  let btn = document.querySelectorAll("#bottomBtn"),
    wave = document.querySelectorAll("#wave");
  $("#startBtn").click(function () {
    $(wave).toggleClass("active");
    $(btn).toggleClass("active");
    $("#startBtn p").slideToggle();
  });
});

var footerHeight = $("#footer").outerHeight();
var fixedNav = $(".nav-bottom").outerHeight();
var cartPay = $(".cart-payment");
$("#marginForNav").css("margin-bottom", `${fixedNav}px`);
$("#marginForNav").css("padding-bottom", 0);

$(function () {
  if ($(window).scrollTop() + $(window).height() == $(document).height()) {
    $(".bottom-nav").css("bottom", footerHeight + "px");
    $("#adOptions").css("bottom", footerHeight + "px");
    $(".shops-bottom-nav").css("bottom", footerHeight + "px");
    $(".cart-bottom-nav").css("bottom", footerHeight + "px");
  } else {
    $(".bottom-nav").css("bottom", "0");
    $("#adOptions").css("bottom", "0");
    $(".shops-bottom-nav").css("bottom", "0");
    $(".cart-bottom-nav").css("bottom", "0");
  }
});

$(window).scroll(function () {
  if ($(window).scrollTop() + $(window).height() == $(document).height()) {
    $(".bottom-nav").css("bottom", footerHeight + "px");
    $("#adOptions").css("bottom", footerHeight + "px");
    $(".shops-bottom-nav").css("bottom", footerHeight + "px");
    $(".cart-bottom-nav").css("bottom", footerHeight + "px");
  } else {
    $(".bottom-nav").css("bottom", "0");
    $("#adOptions").css("bottom", "0");
    $(".shops-bottom-nav").css("bottom", "0");
    $(".cart-bottom-nav").css("bottom", "0");
  }
});

function myFunction(input) {
  var elementValue = input.value;
  document.getElementById("myAnchor").innerHTML = elementValue;
}

let progressDiv = document.querySelectorAll("#starProgress"),
  bar = document.querySelectorAll("#progressBar");

for (let i = 0; i < progressDiv.length; i++) {
  let barVal =
    progressDiv[i].children[1].children[0].getAttribute("aria-valuenow");
  progressDiv[i].children[1].children[0].style.cssText = `width : ${barVal}%`;
  progressDiv[i].children[2].innerHTML = `${barVal}%`;
}

/*remove-items-from-cart*/
$(function () {
  let itemsParent = document.querySelectorAll(".itemsParent");
  for (let i = 0; i < $(itemsParent).length; i++) {
    $(itemsParent[i]).bind("click", (e) => {
      if ($(e.target).prop("id") == "removeBtn") {
        $(e.target).closest("#removeableItem").remove();
      }

      checkLength();
    });
    let qtyInput = document.querySelectorAll("#qtyInput");
    for (let k = 0; k < $(qtyInput).length; k++) {
      $(qtyInput[k]).change(function () {
        checkLength();
        console.log("clicked");
      });
    }

    function checkLength() {
      let priceEl = document.querySelectorAll("#cartItemPrice"),
        cartSubtotal = $("#cartSubtotal"),
        total = $("#cartTotal"),
        shipping = $("#shipping").text(),
        shippingNum = parseInt(shipping),
        priceArr = [];
      for (let j = 0; j < priceEl.length; j++) {
        let qty = $(priceEl[j])
            .closest(".price")
            .siblings(".number")
            .find("input")
            .val(),
          priceText = $(priceEl[j]).text(),
          priceNum = parseInt(priceText);
        qtyTotal = priceNum * qty;
        priceArr.push(qtyTotal);
      }

      let arrNum = priceArr.map((i) => Number(i)),
        subtotal = arrNum.reduce((a, b) => a + b, 0);
      $(cartSubtotal).text(subtotal);

      $(total).text(subtotal + shippingNum);

      let removeable = document.querySelectorAll("#removeableItem");
      $(itemsParent[i])
        .find("#cartLength")
        .html($(itemsParent[i]).find(removeable).length);
      let ctrls = document.querySelectorAll("#removeableControls");

      if ($(itemsParent[i]).find($(removeable)).length >= 1) {
        $(itemsParent[i]).find(".empty-placeholder").css("display", "none");
        $(itemsParent[i]).find($(ctrls)).show();
      } else {
        $(itemsParent[i]).find(".empty-placeholder").css("display", "block");
        $(itemsParent[i]).find($(ctrls)).hide();
      }
    }
    checkLength();
  }
});

/*login-phone-code-inputs*/
$(() => {
  const inputElements = [...document.querySelectorAll("input.code-input")];

  inputElements.forEach((ele, index) => {
    inputElements[0].focus();
    ele.addEventListener("keydown", (e) => {
      if (e.keyCode === 8 && e.target.value === "") {
        inputElements[Math.max(0, index - 1)].focus();
      }
      e.target.style.backgroundColor = "#f5f5f5";
    });
    ele.addEventListener("input", (e) => {
      const [first, ...rest] = e.target.value;
      e.target.value = first ?? "";
      if (index !== inputElements.length - 1 && first !== undefined) {
        inputElements[index + 1].focus();
        inputElements[index + 1].value = rest.join("");
        inputElements[index + 1].dispatchEvent(new Event("input"));
      }
    });
  });

  let codeInput = document.querySelectorAll(".code-input");
  $("#codeForm").submit(function (e) {
    var codeVal = $(codeInput)
      .map(function () {
        return this.value;
      })
      .get()
      .join("");
    $("#resultInput").val(codeVal);
  });
});

/*store-image-uploader*/
$(function () {
  var imagesPreview = function (input, placeToInsertImagePreview) {
    if (input.files) {
      var filesAmount = input.files.length;
      for (i = 0; i < filesAmount; i++) {
        var reader = new FileReader();

        reader.onload = function (event) {
          $(".uploaded-img").remove();
          $(".default-img").remove();
          $(
            $.parseHTML(
              `<img src= ${event.target.result} class="uploaded-img"></img>`
            )
          ).appendTo(placeToInsertImagePreview);
        };

        reader.readAsDataURL(input.files[i]);
      }
    }
  };
  var input = document.querySelector("#storeImgUploader");
  var div = document.querySelector("#storeImg");
  $(input).on("change", function () {
    imagesPreview(this, div);
  });
});

/*store-cover-uploader*/
$(function () {
  var coverPreview = function (input, placeToInsertCoverPreview) {
    if (input.files) {
      var filesAmount = input.files.length;
      for (i = 0; i < filesAmount; i++) {
        var reader = new FileReader();

        reader.onload = function (event) {
          $(".uploaded-cover").remove();
          $(".default-cover").remove();
          $(
            $.parseHTML(
              `<img src= ${event.target.result} class="uploaded-cover"></img>`
            )
          ).appendTo(placeToInsertCoverPreview);
        };

        reader.readAsDataURL(input.files[i]);
      }
    }
  };
  var input = document.querySelector("#storeCoverUploader");
  var div = document.querySelector("#storeCover");
  $(input).on("change", function () {
    coverPreview(this, div);
  });
});

document.cookie = `display=flex; max-age=${10}; path=/`;

// $(function () {
//   let shopPlusBtn = $("#shopPlusBtn"),
//     shopPlusMenu = $("#shopPlusMenu");

//   $(shopPlusBtn).click(function () {
//     $(shopPlusMenu).slideToggle();
//   })
// })

// $(function () {
//   /* splash-screen */
//   let splashScreen = $(".splash-screen"),
//     page = $('#page');
//   setTimeout(() => {
//     $(page).css("cssText", "opacity: 1");
//   }, 4000);

//   $(splashScreen).addClass("opened");
//   setTimeout(() => {
//     checkReady();
//   }, 5500); //Splash the screen in 4 seconds after the page is loaded.

//   function checkReady() {
//     if (document.readyState === 'complete') {
//       $(splashScreen).removeClass("opened");
//       $(splashScreen).addClass("closed");
//     } else {
//       $(splashScreen).addClass("opened");
//       $(splashScreen).removeClass("closed");
//     }
//   }

//   window.addEventListener("load", () => {
//     // //Create a cookie for a day (to expire within a session closed).
//     document.cookie = `websiteSplash=splash`;
//   });

//   //Use the created cookie to hide or show the popup screen.
//   const splashCookie = document.cookie.indexOf("websiteSplash=");

//   if (splashCookie != -1) {
//     $(page).css("cssText", "opacity: 1");
//     $(splashScreen).css("cssText", "display:none"); //Hide the splash screen if the cookie is not expired.
//     console
//   }
//   else {
//     $(page).css("cssText", "opacity:0");
//     $(splashScreen).css("cssText", "display:flex"); //Show the splash screen if the cookie is expired.
//   }
// })

/* (function ($) {
    $.fn.keepRatio = function (which) {
      var $this = $(this);
      var w = $this.width();
      var h = w;
      var ratio = w / h;
      $(window).resize(function () {
        switch (which) {
          case 'width':
            var nh = $this.width() / ratio;
            $this.css('height', nh + 'px');
            break;
          case 'height':
            var nw = $this.height() * ratio;
            $this.css('width', nw + 'px');
            break;
        }
      });
  
    }
  })(jQuery);
  
  $(document).ready(function () {
    $('.sameHeight').keepRatio('width');
  }); */

$(document).ready(function () {
  $("#minus").click(function () {
    var $input = $(this).parent().find("input");
    var count = parseInt($input.val()) - 1;
    count = count < 1 ? 1 : count;
    $input.val(count);
    $input.change();
    return false;
  });
  $("#plus").click(function () {
    var $input = $(this).parent().find("input");
    $input.val(parseInt($input.val()) + 1);
    $input.change();
    return false;
  });
});
