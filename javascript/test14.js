var num1 = document.getElementById("num1")
var num2 = document.getElementById("num2")
var btn = document.getElementById("btn")
btn.onclick = function(){
    var x = parseFloat(num1.value) + parseFloat(num2.value)
    document.getElementById("result").innerHTML = x
 // alert( parseFloat(num1.value) + parseFloat(num2.value) )
}