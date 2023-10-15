const submitButton=document.getElementById("submit_Button");
const propertyForm=document.getElementById("property_form");

propertyForm.addEventListener("submit",(event)=>{
    submitButton.disabled=true;
    submitButton.innerHTML="Adding....";
})

