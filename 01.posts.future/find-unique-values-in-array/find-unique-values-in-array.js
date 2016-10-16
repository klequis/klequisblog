"use strict";

const pstart = "<p>";
const pend = "</p>";
const bstart = "<b>";
const bend = "</b>";

/* *******************************/

h1("Example 1 - Find number in array");
h("Note that the start value is 0 based but the return value is 1 based.");
var array = [2, 9, 9];
print1DArray("array", array);
wval("indexOf 2", array.indexOf(2));
wval("indexOf 9", array.indexOf(9));
wval("indexOf 9 with start 2", array.indexOf(9, 2));

h1("Example 2 - Count number of times value is in an array");
var a2 = ["a", "b", "c", "a", "c", "a"];
print1DArray("a2", a2);

h("Intended output: [[a,3], [b,1], [c,2]]");
var indices = [];
h3("Get number of unique values in an array");
var unique = [];
var val;
h("First find the unique values in a2");
for (var i = 0; i < a2.length; i++) {
  val = a2[i];
  if (unique.indexOf(val) === -1) {
    unique.push(val);
  }
}
print1DArray("unique", unique);
h("Now count the number of times each unique value is in 'a2'");
for (i = 0; i < unique.length; i++) {
  val = unique[i];
  var count = 0;
  var retIdx = 0;
  var startIdx = 0;
  do {
    retIdx = a2.indexOf(val, startIdx);
    // p("retIdx=" + retIdx + " | val=" + val + " | startIndex=" + startIdx);
    if (retIdx != -1) {
      count++;
      retIdx === 0 ? startIdx++ : startIdx = retIdx +1;
    }
  } while (retIdx != -1);
  indices.push([val, count]);
}
p(indices);

h1("Find uinque values using filter()");
// arr.filter(callback[, thisArg])
// element, index, array

var a3 = a2.filter(function(e, i, arr) {
  // p("e=" + e + " | i=" + i + " | arr=" +arr);
  return arr.indexOf(e, i+1) === -1;
}).reverse();
wval("a3", a3);

h1("Use fat arrow syntax");
var a4 = a2.filter((e, i, arr) => arr.indexOf(e, i+1) === -1);
wval("a4", a4);

// change order
var a6 = ["b", "c", "a", "a", "c", "d", "a"];
var a7 = a6.reverse().filter((e, i, arr) => arr.indexOf(e, i+1) === -1).reverse();
wval("a6.reverse()", a7);
var a8 = a6.filter((e, i, arr) => arr.indexOf(e, i+1) === -1);
wval("a6 not reversed", a8);

h1("Explore how indexOf() works");
print1DArray("a2", a2);
wval("a2.indexOf('a', 0)", a2.indexOf("a", 0));
wval("a2.indexOf('a', 1)", a2.indexOf("a", 1));
wval("a2.indexOf('a', 3)", a2.indexOf("a", 3));
wval("a2.indexOf('a', 4)", a2.indexOf("a", 4));
wval("a2.indexOf('a', 5)", a2.indexOf("a", 5));
wval("a2.indexOf('a', 6)", a2.indexOf("a", 6));

h("test if index is 0 based");
var a5 = ["a", "b", "c"];
wval ("a5=", a5);
wval("indexOf('a')", a5.indexOf("a"));
wval("indexOf('a', 0)", a5.indexOf("a", 0));
wval("indexOf('a', 1)", a5.indexOf("a", 1));
wval("indexOf('b')", a5.indexOf("b"));
wval("indexOf('b', 1)", a5.indexOf("b", 1));
wval("indexOf('b', 2)", a5.indexOf("b", 2));
wval("indexOf('c')", a5.indexOf("c"));
wval("indexOf('c', 2)", a5.indexOf("c", 2));
wval("indexOf('c', 3)", a5.indexOf("c", 3));

/* ****************************** */
/* Write is a line of text with a <br> on the end */
function write(text) {
  document.write(text + "<br>");
}
function t(text) {
  write(text);
}
/* p() is just a paragrahp */
function p(text) {
  document.write(pstart + text + pend);
}
/* h() is for paragraph style as a heading */
function h(text) {
  var str = "<p class=h-print>" + text + "</p>";
  document.write(str);
}

function wval(desc, value) {
  // write(pstart + bstart + desc + " = " + bend + value + pend);
  write(bstart + desc + " = " + bend + value);
}

function h1(text) {
  whead(text, 1);
}

function h2(text) {
  whead(text, 2);
}

function h3(text) {
  whead(text, 3);
}

function h4(text) {
  whead(text, 4);
}

function whead(text, level) {
  var val = level ? level : 1;
  var h = document.createElement("h" + val);
  var t = document.createTextNode(text);
  h.appendChild(t);
  document.body.appendChild(h);
}

function print1DArray(arrayName, arr) {
  var str = bstart + arrayName + " =" + bend + " [" ;
  var length = arr.length;
  for (i = 0; i < length; i++) {
    str += arr[i];
    if (i < length - 1) {
      str += ", ";
    }
  }
  str += "]";
  write(str);
}
