function validationID()
{
    var str = document.getElementById("NID").value;
    var res = str.split('');
    var Array = res;
    var month = Array[3] + Array[4];
    var day = Array[5] + Array[6];
    
    console.log("the res variable" ,res);
    console.log("the Array variable" ,Array);
    var length = str.length;
    if (length !== 14)
    {
        document.getElementById("errror").innerHTML = "خطأ فى الرقم القومى *";
        document.getElementById("activated").style.display = "none";
        
    }

    // Check the left most digit
    if (Array[0] != 2 && Array[0] != 3)
    {
        document.getElementById("errror").innerHTML = "خطأ فى الرقم القومى *";
        document.getElementById("activated").style.display = "none";
    }
        
    if(month < 01 && month > 12)
    {
        document.getElementById("errror").innerHTML = "خطأ فى الرقم القومى *";
        document.getElementById("activated").style.display = "none";
    }
    if(day < 01 || day > 31){
        document.getElementById("errror").innerHTML = "خطأ فى الرقم القومى *";
        document.getElementById("activated").style.display = "none";
    }
    if(month < 01 || month > 12){
        document.getElementById("errror").innerHTML = "خطأ فى الرقم القومى *";
        document.getElementById("activated").style.display = "none";
    }
    else
    {
        document.getElementById("errror").innerHTML = " "; 
        var res1 = Array[0] * 2;
        var res2 = Array[1] * 7;
        var res3 = Array[2] * 6;
        var res4 = Array[3] * 5;
        var res5 = Array[4] * 4;
        var res6 = Array[5] * 3;
        var res7 = Array[6] * 2;
        var res8 = Array[7] * 7;
        var res9 = Array[8] * 6;
        var res10 = Array[9] * 5;
        var res11 = Array[10] * 4;
        var res12 = Array[11] * 3;
        var res13 = Array[12] * 2;
        var res14 = Array[13];
        console.log(res1);
        var totalres = (res1 + res2 + res3 + res4 + res5 + res6 + res7 + res8 + res9 + res10 + res11 + res12 + res13);
        console.log(totalres);
        var x = totalres / 11;
        var out = parseInt(x) * 11;
        var ot = totalres - out;
        console.log(ot);
        var y = 11 - ot;
        console.log(y);
        if(y == 11){
            y = 1;
            console.log("y =" + y); 
        }
        else if(y == 10){
            y = 0
            console.log("y =" + y); 
        }     
                
        if (res14 == y) {
            document.getElementById("errror").innerHTML = " ";
            document.getElementById("activated").style.display = "block";
            
        } 
        else {
            console.log("y =" + y); 
            document.getElementById("errror").innerHTML = "خطأ فى الرقم القومى *";
            document.getElementById("activated").style.display = "none";
            return false;
        }
}
}
