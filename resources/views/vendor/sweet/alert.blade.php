@if (Session::has('sweet_alert.alert'))
    {{-- <script>
        @if (Session::has('sweet_alert.content'))
            var config = {!! Session::pull('sweet_alert.alert') !!}
            var content = document.createElement('div');
            content.insertAdjacentHTML('afterbegin', config.content);
            config.content = content;
            swal(config);
        @else
            Swal.fire({!! Session::pull('sweet_alert.alert') !!});
        @endif
    </script> --}}
    <script>
        @if (Session::has('sweet_alert.content'))
            var config = {!! Session::pull('sweet_alert.alert') !!}
            var content = document.createElement('div');
            content.insertAdjacentHTML('afterbegin', config.content);
            config.content = content;
            swal(config);
        @else
            Swal.fire({
                text: "{!! Session::get('sweet_alert.text') !!}",
                title: "{!! Session::get('sweet_alert.title') !!}",
                timer: {!! Session::get('sweet_alert.timer') !!},
                type: "{!! Session::get('sweet_alert.icon') !!}",

                // more options
            }).then(function(){ 
                // despues recargar la pagina
                // para que el evento no se repita
               location.reload();
            });
        @endif
    </script>
@endif
