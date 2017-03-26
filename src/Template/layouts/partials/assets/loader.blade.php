<div class="progress" id="{!! isset($id) ? $id : 'progress-bar' !!}">
    <div class="progress-bar progress-bar-striped active" role="progressbar"
         aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
    </div>
</div>

<script>
    function showLoading(){
        $('#{!! isset($id) ? $id : 'progress-bar' !!}').show();
    }

    function hideLoading(){
        $('#{!! isset($id) ? $id : 'progress-bar' !!}').hide();
    }
</script>