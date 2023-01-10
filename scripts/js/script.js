const form_cadastro = document.forms.namedItem("Register");
const btnRegister = form_cadastro.elements.namedItem('btn_Register');

const form_login = document.forms.namedItem("Login");
const btnLogin = form_login.elements.namedItem('btn_Login');


const validateName_cad = () => form_cadastro.elements.namedItem('inputName_cad').value.trim().length > 0;
const validatePass_cad = () => form_cadastro.elements.namedItem('inputPass_cad').value.trim().length > 0;

const validateName_log = () => form_login.elements.namedItem('inputName_log').value.trim().length > 0;
const validatePass_log = () => form_login.elements.namedItem('inputPass_log').value.trim().length > 0;

const validateInputs_cadastro = () => {
    if(!validateName_cad()){
        return alert('Digite um nome');
    }
    if(!validatePass_cad()){
        return alert('Digite uma senha');
    }
    form_cadastro.action = 'scripts/php/cadastro.php';
}

const validateInputs_login = () => {
    if(!validateName_log()){
        return alert('Nome incorreto ou inválido');
    }
    if(!validatePass_log()){
        return alert('Senha incorreta ou inválida');
    }
    form_login.action = 'scripts/php/login.php';
}

btnRegister.addEventListener('click', validateInputs_cadastro);
btnLogin.addEventListener('click', validateInputs_login);
