    let selectInit = $('#search').select2({
        minimumInputLength: 1,
        ajax: {
            url: "{{ route('search') }}",
            data: function(params) {
                var query = {
                    search: params.term,
                    type: 'public'
                }
                return query;
            },
            processResults: function(data, params) {
                const results = $.map(data, (item) => {
                    item.text = item.text;
                    return item
                })
                return {
                    results: results
                }
            }
        }
    });

    $('#search').on('select2:select', function(e) {
        let adSlug = e.params.data.slug,
            url = '{{ route('ad.show', ':slug') }}';

        url = url.replace(':slug', adSlug);
        setTimeout(() => {
            $(selectInit).val(null).trigger("change");
        }, 100);
        setTimeout(() => {
            window.location.href = url;
        }, 150);
    });
