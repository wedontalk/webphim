@if(Session::has('success'))
<script>
    Toastify({
    text: "{{session::get('success')}}",
    duration: 3000,
    close:true,
    backgroundColor: "#4fbe87",
    }).showToast();
    </script>
@endif
@if(Session::has('error'))
<script>
    Toastify({
    text: "{{session::get('error')}}",
    duration: 3000,
    close:true,
    backgroundColor: "#4fbe87",
    }).showToast();
    </script>
@endif