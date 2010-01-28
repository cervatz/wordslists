<script type="text/javascript">
  $(document).ready(function(){
    $("#UserRegisterForm").validate({
  rules: {
    password: {
      required: true,
      minlength: 8
    },
    username: {
      required: true,
      minlength: 8
    },
    email: {
      required: true,
      email: true
    },
    password2: {
     equalTo: "#password"
    }			
  }
});
  });
  </script>
