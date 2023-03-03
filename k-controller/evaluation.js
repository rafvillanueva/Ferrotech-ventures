function confirm(){
    document.getElementById("confirm_panel").style.display = "none";
    document.getElementById("final_panel").style.display = "block";
}
function cancel(){
    document.getElementById("confirm_panel").style.display = "block";
    document.getElementById("final_panel").style.display = "none";
}
function part_i() {
    // Get Values
    var num1 = document.getElementById("num1").value;
    var num2 = document.getElementById("num2").value;
    var num3 = document.getElementById("num3").value;
    var num4 = document.getElementById("num4").value;
    var num5 = document.getElementById("num5").value;
    var num6 = document.getElementById("num6").value;
    var num7 = document.getElementById("num7").value;
    var total = Number(num1) + Number(num2) + Number(num3) + Number(num4) + Number(num5) + Number(num6) + Number(num7);
    
    // Convert Total
    var conv = 0;
    if(total === 7){
        conv = 15;
    }else if(total === 8){
        conv = 17;
    }else if(total === 9){
        conv = 19;
    }else if(total === 10){
        conv = 21;
    }else if(total === 11){
        conv = 24;
    }else if(total === 12){
        conv = 26;
    }else if(total === 13){
        conv = 28;
    }else if(total === 14){
        conv = 30;
    }else if(total === 15){
        conv = 32;
    }else if(total === 16){
        conv = 34;
    }else if(total === 17){
        conv = 36;
    }else if(total === 18){
        conv = 39;
    }else if(total === 19){
        conv = 41;
    }else if(total === 20){
        conv = 43;
    }else if(total === 21){
        conv = 45;
    }else if(total === 22){
        conv = 47;
    }else if(total === 23){
        conv = 49;
    }else if(total === 24){
        conv = 51;
    }else if(total === 25){
        conv = 54;
    }else if(total === 26){
        conv = 56;
    }else if(total === 27){
        conv = 58;
    }else if(total === 28){
        conv = 60;
    }else if(total === 29){
        conv = 62;
    }else if(total === 30){
        conv = 64;
    }else if(total === 31){
        conv = 66;
    }else if(total === 32){
        conv = 69;
    }else if(total === 33){
        conv = 71;
    }else if(total === 34){
        conv = 73;
    }else if(total === 35){
        conv = 75;
    }

    // Display Total Part I
    document.getElementById("part1_total").value = conv;
    get_ratings();
}
function part_ii(){
    var num8 = document.getElementById("num8").value;
    var num9 = document.getElementById("num9").value;
    var num10 = document.getElementById("num10").value;
    var num11 = document.getElementById("num11").value;
    var num12 = document.getElementById("num12").value;
    var num13 = document.getElementById("num13").value;
    var total = Number(num8) + Number(num9) + Number(num10) + Number(num11) + Number(num12) + Number(num13);

    // Convert Total
    var conv = 0;
    if(total === 6){
        conv = 5;
    }else if(total === 7){
        conv = 6;
    }else if(total === 8){
        conv = 7;
    }else if(total === 9){
        conv = 7.5;
    }else if(total === 10){
        conv = 8;
    }else if(total === 11){
        conv = 9;
    }else if(total === 12){
        conv = 10;
    }else if(total === 13){
        conv = 11;
    }else if(total === 14){
        conv = 12;
    }else if(total === 15){
        conv = 12.5;
    }else if(total === 16){
        conv = 13;
    }else if(total === 17){
        conv = 14;
    }else if(total === 18){
        conv = 15;
    }else if(total === 19){
        conv = 16;
    }else if(total === 20){
        conv = 17;
    }else if(total === 21){
        conv = 17.5;
    }else if(total === 22){
        conv = 18;
    }else if(total === 23){
        conv = 19;
    }else if(total === 24){
        conv = 20;
    }else if(total === 25){
        conv = 21;
    }else if(total === 26){
        conv = 22;
    }else if(total === 27){
        conv = 22.5;
    }else if(total === 28){
        conv = 23;
    }else if(total === 29){
        conv = 24;
    }else if(total === 30){
        conv = 25;
    }

    // Display Total Part II
    document.getElementById("part2_total").value = conv;
    get_ratings();
}
function get_ratings(){
    var p1 = document.getElementById("part1_total").value;
    var p2 = document.getElementById("part2_total").value;
    var ptotal = Number(p1) + Number(p2);

    // Display Ratings
    document.getElementById("ratings").value = ptotal;
}
function saved_rate(){
    var status = document.getElementById("status").value;
    var rate = document.getElementById("ratings").value;
    var id = document.getElementById("idx").value;
    window.location.href = "casualevaluation.php?id=" + id + "&type=" + status + "&rate=" + rate;
}
function saved_rate_prj(){
    var status = document.getElementById("status").value;
    var rate = document.getElementById("ratings").value;
    var id = document.getElementById("idx").value;
    window.location.href = "projectbasedevaluation.php?id=" + id + "&type=" + status + "&rate=" + rate;
}
function saved_rate_reg(){
    var status = document.getElementById("status").value;
    var rate = document.getElementById("ratings").value;
    var id = document.getElementById("idx").value;
    window.location.href = "regularevaluation.php?id=" + id + "&type=" + status + "&rate=" + rate;
}