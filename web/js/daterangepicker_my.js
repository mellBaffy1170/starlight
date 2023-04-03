$('input[name="DataForm[dates]"]').daterangepicker({
    minDate: moment(),
    locale: {
        format: 'YYYY-MM-DD'
    }
});

let formData = {};
const form = document.querySelector('form');
const LS = localStorage;

//получение данных из input

form.addEventListener('input', function (event){
    formData[event.target.name]  = event.target.value;
    LS.setItem('formData', JSON.stringify(formData));
})

//восстановление данных
if (LS.getItem('formData')){
    formData = JSON.parse(LS.getItem('formData'));
    for(let key in formData){
        form.elements[key].value = formData[key];
    }
}