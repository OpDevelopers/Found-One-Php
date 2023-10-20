const url="/deleteProperty/";
const deleteConfirmAppear=document.querySelectorAll(".deleteConfirmAppear");
const deleteButtons=document.querySelectorAll(".delete-button");
const confirmBox=document.querySelector(".confirm-box");
const cancleButton=document.querySelector(".cancle");
const confirmButton=document.querySelector(".delete-button");
console.log(deleteButtons,confirmBox);

deleteConfirmAppear.forEach((button)=>{
    button.addEventListener("click",async (event)=>{
        event.preventDefault();
        const objectId=button.getAttribute('data-id');
        console.log(objectId);
        confirmBox.style.display = "block";

        cancleButton.addEventListener("click",()=>{
            confirmBox.style.display="none";
        });
confirmButton.addEventListener("click",async ()=>{
try{
    const response=await fetch(url +objectId,{method:"DELETE"});
    console.log(response);
    if(response.ok){
    console.log("Element has been deleted");
    refreshPage();
    }else{
        const errorMessage=await response.text();
        console.log("Error deleting the element",errorMessage);
    }
}catch(error){
    console.error(error);
}finally {
    confirmBox.style.display="none";
}
});
});   
});

const refreshPage = () => {
    window.location.reload();
  };