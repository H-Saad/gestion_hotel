$(function() {
    $("form[name='reg']").validate({
      rules: {
        username:{
            minlength: 5,
            maxlength: 15,
        },
        password: {
            required: true,
            minlength: 5
        },
        passwordc: {
          required: true,
          minlength: 5,
          equalTo: "#pwd"
        },
        email: {
          required: true,
          email: true
        },
        num: {
            number:true,
            rangelength: [10,10]    
        }
      },
      messages: {
        password: {
          required: "Entrer un mot de passe",
          minlength: "Mot de passe doit etre plus de 4 caracteres"
        },
        passwordc: {
          required: "Repetez votre mot de passe",
          minlength: "Mot de passe doit etre plus de 4 caracteres",
          equalTo: "Les mots de passes ne sont pas similaires."
        },
        username:{
            minlength: "Doit etre plus de 4 caracteres",
            maxlength: "Maximaum 15 caracteres"
        },
        num: {
            number: "Doit etre un numero",
            rangelength: "Numero doit contenir exactement 10 nombres"
        },
        email: "Entrez une adresse email valide"
      },
      submitHandler: function(form) {
        form.submit();
      }
    });
  });