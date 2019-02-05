//function to capture and store each form data into an information array
function processForm(){
    alert("Data has been submitted.");
    let first_namejs = document.querySelector("#firstname").value;
    let second_namejs = document.querySelector("#lastname").value;
    let emailjs=document=document.querySelector("#email").value;
    //creating an instance variable called infoarrray
    let infoarray=[first_namejs, second_namejs,emailjs];
    console.log(Object.values(infoarray))
}

//alert("hello");
function Regurgitate(){

    let text=document.querySelector("#srch-term").value;
    alert("You searched for " + text);
}

