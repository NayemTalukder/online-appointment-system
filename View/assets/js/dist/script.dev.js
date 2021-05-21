"use strict";

function $(querySelector) {
  return document.querySelector(querySelector);
}

function navHighlight(val) {
  $(".nav-link.active").classList.remove("active");
  $(".nav-link.".concat(val)).classList.add("active");
} // flatpickr("#date-picker", {});