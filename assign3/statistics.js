
function total(nums) {
  return nums.length;
}

function sum(nums) {
  var sum = 0.00;

  for(var i = 0; i < total(nums); i++) {
    sum += parseInt(nums[i]);
  }
  
  return sum;
}
function mean(nums) {
  return (sum(nums)/nums.length).toFixed(2);
}

function median(nums) {

  var median = 0;

  if(nums.length % 2 == 1) {
    median = parseInt(nums[Math.floor(nums.length/2)]);
  }
  else {
    var mid1 = nums.length/2;
    median = (parseInt(nums[mid1-1]) + parseInt(nums[mid1]))/2;
  }
  return median;
}

function mode(nums) {

  var occurence = [];
  var mode = 0;
  var tmp = 0;
  for (var i = 0; i < nums.length; i++) {
    var currNum = nums[i];
    var count = 0;
    for(var j = 0; j < num.length; j++) {
      if(currNum == nums[j])
        count++;
    }
    occurence[i] = count; 
  }
  for (var t = 0; t < nums.length; t++) {
   if(occurence[t] > tmp) {
     tmp = occurence[t];
     mode = parseInt(nums[t]);
   } 
  }
  return mode;
}

function variance(nums) {
  var topHalf = [];
  var imean = mean(nums); 
  var sum = 0;
  
  for(var  i = 0; i < nums.length; i++) {
    topHalf[i] = Math.pow((parseInt(nums[i]) - imean), 2);
    sum += topHalf[i];
  }

  return (sum/(total(nums)-1)).toFixed(2);
}

function standardDev(nums) {
  return (Math.sqrt(variance(nums))).toFixed(2);
}

