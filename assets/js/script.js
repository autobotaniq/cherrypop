;(function($) {
  'use strict'

  function loginRegistrationForm(data_form_login, submit) {
    $.ajax({
      url: ajax_var.url,
      data: data_form_login,
      type: 'POST',
      beforeSend: function(xhr) {
        submit.data('text', submit.text()).text('Loading...')
      },
      success: function(data) {
        let dataMessage = JSON.parse(data)

        submit.text(submit.data('text'))
        if (dataMessage.message) {
          $('.error_message').html(
            '<div class="text-danger font__size-15"><strong>ERROR:</strong> ' +
              dataMessage.message +
              '</div>'
          )
          animateToform(submit.closest('form'))
        }

        if (dataMessage.success) {
          setTimeout(function() {
            document.location.href = dataMessage.linkhome
          }, 1000)
        }
      }
    })
  }

  // animate to form
  function animateToform(form) {
    $('.modalWrapper').animate(
      {
        scrollTop: form.offset().top
      },
      500
    )
  }

  /**
   * Login Form
   **/
  var cprLoginForm = $('#cpr-login-form'),
    cprSubmitLoginForm = cprLoginForm.find('[type="submit"]'),
    data_form_login = {
      action: 'cpr_login',
      query: ''
    }

  function activatLoginForm() {
    data_form_login.query = cprLoginForm.serialize()

    loginRegistrationForm(data_form_login, cprSubmitLoginForm)
  }

  $(cprSubmitLoginForm).on('click', function() {
    $(cprLoginForm).on('submit', function(e) {
      e.preventDefault()
    })

    activatLoginForm()
  })

  /**
   * Registration Form
   **/
  var cprRegistrationForm = $('#cpr-registration-form'),
    cprSubmitRegistrationForm = $('.cpr_registration-button'),
    data_form_registration = {
      action: 'cpr_registration',
      query: ''
    }

  function activatRegistrationForm() {
    data_form_registration.query = cprRegistrationForm.serialize()

    loginRegistrationForm(data_form_registration, cprSubmitRegistrationForm)
  }

  $(cprSubmitRegistrationForm).on('click', function() {
    $('.cpr-pricing-plan').on('submit', function(e) {
      e.preventDefault()
    })

    activatRegistrationForm()
  })

  /* --------------- Deleting placeholder focus --------------- */
  let inputPlaceholder = $('input, textarea')
  inputPlaceholder.on('focus', function() {
    $(this).data('placeholder', $(this).attr('placeholder'))
    $(this).attr('placeholder', '')
  })

  inputPlaceholder.on('blur', function() {
    $(this).attr('placeholder', $(this).data('placeholder'))
  })
  /* ------------- End Deleting placeholder focus ------------- */
})(jQuery)
