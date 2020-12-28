@if(Session::has('message'))
<script type="text/javascript">
    $(document).ready(function() {
        var error = '{{Session::get('error')}}';
        var message = '{{Session::get('message')}}';
        SiapAlert(error, message);
    });
</script>
@endif

<script type="text/javascript">
    function SiapAlert(error, message){
        if(error=='info'){
            icon = "info-circle";
        }else if(error=='success'){
            icon = "check";
        }else if(error=='warning'){
            icon = "exclamation";
        }else if(error=='danger'){
            icon = "times";
        }else if(error=='error'){
            error = "danger";
            icon = "times";
        }
        Siap.helpers('notify', {type: error, icon: 'fa fa-'+ icon +' mr-1', message: message});
    }
</script>