<!-- REQUIRED JS SCRIPTS -->
<!-- Slimscroll -->
<script src="{{ asset('/plugins/slimScroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/js/app.min.js') }}" type="text/javascript"></script>
<!-- AjaxQ -->
<script src="{{ asset('/js/ajaxq.js') }}" type="text/javascript"></script>
<!-- Jasny Bootstrap -->
<script src="{{ asset('js/jasny-bootstrap.js') }}" type="text/javascript"></script>
<!-- Javascript helper -->
<script src="{{ asset('js/helper.js') }}" type="text/javascript"></script>

{{-- CKEditor --}}
{{--<script src="{{ asset('/plugins/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/ckeditor/adapters/jquery.js') }}" type="text/javascript"></script>

<script src="{{ asset('/plugins/ckeditor/config.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/ckeditor/styles.js') }}" type="text/javascript"></script>--}}

{{-- Tiny editor --}}
<script src="{{ asset('/plugins/tinymce/tinymce.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/tinymce/jquery.tinymce.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}" type="text/javascript"></script>

<script src="{{ asset('plugins/daterangepicker/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>

<script src="{{ asset('/plugins/iCheck/icheck.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('/plugins/jtemple/dist/jtemple.min.js') }}" type="text/javascript"></script>
<!-- SweetAlert Bootstrap -->
<script src="{{ asset('/plugins/sweetalert2/sweetalert2.min.js') }}" type="text/javascript"></script>
<!-- Element Stack -->
<script src="{{ asset('/plugins/elstack/elStack.min.js') }}" type="text/javascript"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->

<script>
      $(document).ready(function(){
            /* Ajax form CSRF token */
            $.ajaxSetup({
                  headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
            });

            $('.validation-not-empty input[type=text]').tooltip({ 'placement' : 'auto' });
            $('.validation-not-empty').submit(function(event){
                  if($('input[type=text]', this).val() == ''){
                        event.preventDefault();
                        $('input[type=text]', this).focus();
                        $('input[type=text]', this).tooltip('show');
                  }
            });
            $('[data-csfield-type="datepicker"]').datepicker();
            $('[data-csfield-type="daterangepicker"]').daterangepicker();

            $('input').not('.icheck-off').iCheck({
                  checkboxClass: 'icheckbox_square-blue',
                  radioClass: 'iradio_square-blue',
                  increaseArea: '20%' // optional
            });

            /* Rich editor */

            tinyMCE.init({
                  selector: '.rich-editor',
                  theme : "modern",
                  plugins : "layer," +
                  "table," +
                  "save," +
                  "emoticons," +
                  "insertdatetime," +
                  "preview," +
                  "media," +
                  "searchreplace," +
                  "print," +
                  "contextmenu," +
                  "paste," +
                  "directionality," +
                  "fullscreen," +
                  "noneditable," +
                  "visualchars," +
                  "nonbreaking," +
                  "template",

                  plugins: [
                        "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
                        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                        "table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern"
                  ],

                  toolbar1: "newdocument fullpage | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
                  toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | insertdatetime preview | forecolor backcolor",
                  toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking restoredraft",

                  menubar: false,
                  toolbar_items_size: 'small',

                  relative_urls : false,
                  remove_script_host : false,
                  convert_urls : true

            });

            /* make scrollable selector */
            $('.scrollable').slimScroll({
                  height: 500
            });
      });
</script>

@yield('page_script')
