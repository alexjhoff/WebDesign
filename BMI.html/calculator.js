function calculateBMI(){
    var weight = document.getElementById("weight").value;
    var height = document.getElementById("height").value;
    var BMI = ((weight*703)/(height*height))
    alert ("Your BMI is: "+BMI+"\n");
}