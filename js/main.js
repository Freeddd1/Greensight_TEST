$("#clickbtn").on("click", function(e) {
  e.preventDefault()

  var name = $("#name").val().trim();
  var lastName = $("#lastName").val().trim();
  var email = $("#email").val().trim();
  var password = $("#password").val().trim();
  var rePassword = $("#rePassword").val().trim();

  $.ajax({
    url: '/check.php',
    type: 'POST',
    cache: false,
    data: {
      'name': name,
      'lastName': lastName,
      'email': email,
      'password': password,
      'rePassword': rePassword
    },
    dataType: 'json',

    success: function(data) {
      if (data.status === true)
      {
        $(".container").hide(1);
        setTimeout(()=>alert('Вы успешно зарегистрированы !'),2);
      }
      else
      {
          $('#errmsg').text(data.message);
      }
    }
  });

});
