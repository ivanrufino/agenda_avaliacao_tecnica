$(document).ready(function(){
    $('.mask_cep').mask('00.000-000');
    $('.mask_telefone').mask('0000-00009');
    
})
$(document).ready(function() { 
    $("#btn_saveContato").click(function(){
        $('#saveContato').submit();
    })
    var options = { 
        target:        '#message',   // target element(s) to be updated with server response 
        beforeSubmit:  validate,  // pre-submit callback 
        success:       processJson,  // post-submit callback 
        dataType:  'json',
    }; 
 
    // bind form using 'ajaxForm' 
                
    $('#saveContato').ajaxForm(options); 
}); 
 
// pre-submit callback 
function showRequest(formData, jqForm, options) { 
    // formData is an array; here we use $.param to convert it to a string to display it 
    // but the form plugin does this for you automatically when it submits the data 
    var queryString = $.param(formData); 
 
    // jqForm is a jQuery object encapsulating the form element.  To access the 
    // DOM element for the form do this: 
    // var formElement = jqForm[0]; 
 
    alert('About to submit: \n\n' + queryString); 
 
    // here we could return false to prevent the form from being submitted; 
    // returning anything other than false will allow the form submit to continue 
    return true; 
} 
 
// post-submit callback 
function processJson(data)  { 
    if(data.message=='ok'){
        $('#saveContato').clearForm();
        $("#message").html("Contato inserido com sucesso");
    }else{
        $("#message").html(data.message)
    }
    //alert(data);
} 
function validate(formData, jqForm, options) { 
    var form = jqForm[0]; 
    var erros = "";
    if (!form.nome.value){
        erros +="Nome é obrigatório <br>"
    }
    if (!form.email.value){
        erros +="Email é obrigatório <br>"
    }
    if (!form.telefone.value){
        erros +="Telefone é obrigatório <br>"
    }
    if (!form.celular.value){
        erros +="Celular é obrigatório <br>"
    }

    if (erros != "") { 
        $("#message").html(erros);
        //alert('Please enter a value for both Username and Password'); 
        return false; 
    } 
    $("#message").html("");
    
}