
$(function(){
 list_Client()
 hands_Menu()
 hands_section()
 list_drivers()
  $('#drivers-form').submit(function(e){
    var parametros = new FormData($("#drivers-form")[0])
    $.ajax({
      data: parametros,
      url: "../../model/driver_info.php",
      type: "POST",
      contentType: false,
      processData:false,
      
      success: function(response){
        console.log(response)
        list_drivers()
        $('#drivers-form').trigger('reset')
       }
    })
    e.preventDefault()
  })

  function hands_section(){
  $('#Drivers_section').hide()
  $('#Report_section').show()
  
    $('#Drivers').click(function(){
      $('#Home_section').hide()
      $('#Drivers_section').show()
    })
    $('#Home').click(function(){
      $('#Drivers_section').hide()
      $('#Home_section').show()
    })
  }

  function hands_Menu(){
      $('#open-menu').hide()

      $( "#icon-menu" ).click(function() {
        if ($('#menu-bar').is(':visible')) {

          $('#open-menu').show()
          $('#menu-bar').hide()
      } else {
        
        $('#menu-bar').fadeIn('20')
          $('#menu-bar').show()
          $('#open-menu').hide()
      }
        
      });


      $("#open-menu").click(function(){
      if ($('#menu-bar').is(':visible')) {
          $('#menu-bar').fadeIn('20')
          $('#open-menu').show()
        console.log("Presionado")
      } else {

          $('#menu-bar').fadeIn('20')
          $('#menu-bar').show()
          $('#open-menu').hide()
      }

      })

  }

  function list_Client(){
   
    $.ajax({
      url: '../../controller/list_client.php', 
      type: 'GET',
      success: function(response){ 
      let clientsObject = JSON.parse(response);
      let row_design = '' 
    
      clientsObject.forEach(client => {
            row_design += `<tr class="bg-light">
            <td>${client.date_client_b}</td>
            <td>${client.phone_client_b}</td>
            <td>${client.name_client_b}</td>
            <td>${client.name_driver_b}</td>
            <td>s/ 5.50</td>
            <td>
            <span style="font-size: 2em; color: #005d0c; ">
            <a href="#Somos" style='text-decoration:none;color:#005d0c; outline-style: none;' >
            <i class="fas fa-check-square"></i>          
            </a>
            </span>
          
            <span style="font-size: 2em; color: #900000; opacity:0.5;" >
            <a href="#Somos" style='text-decoration:none;color:#900000; outline-style: none;' >
            <i class="fas fa-window-close"></i></i>      </a>
             </span>

          </td>
            </tr>`
       
      })
        $('#clients').html(row_design)
      }
    })
  }
  
  function list_drivers(){

    $.ajax({
      url: '../../controller/list_driver.php',
      type: 'GET',
      success: function(response){
        let driversObject = JSON.parse(response);
        console.log(driversObject)
        let template_ui = ''

        driversObject.forEach(driver => {
          template_ui += `<tr class="bg-light ">
          <td>
          <img style="width:120px; heigth: 120px;"
          src="../../resource/drivers_photo/${driver.photo__driver_b}">
          </td>
          <td>${driver.enrollment_driver_b}</td>
          <td>${driver.name_driver_b}</td>
          <td>${driver.dni_driver_b}</td>
          <td>${driver.phone_driver_b}</td>
          </tr>`
        })
        
        $('#drivers').html(template_ui)
      }


    })


  }





});