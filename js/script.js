// import "https://flackr.github.io/scroll-timeline/dist/scroll-timeline.js";
// import "../index";

// const scrollTracker = document.querySelector(".scroll-tracker");

// const scrollTrakingTimeline = new ScrollTimeline({
//   source: document.scrollingElement,
//   orientation: "block", // you can switch this thing as per your requirement
//   scrollOffsets: [CSS.px(200), CSS.percent(80)], // Start and end points
// });

// scrollTracker.animate(
//   {
//     transform: ["scaleX(0)", "scaleX(1)"],
//   },
//   {
//     duration: 1,
//     timeline: scrollTrakingTimeline, // this is the part of the web animations API
//   }
// );


let counting = 250;

let count = (document.querySelector(".count-num").innerHTML = counting);

let textArea = document.querySelector("#message");

textArea.addEventListener("keydown", async (event) => {
  try {
    if (event) {
      if (event.key === "Backspace") {
        counting = count < 250 ? count++ : 250;
      } else {
        counting = count > 0 ? count-- : 0;
      }
      let decreasing = (document.querySelector(".count-num").innerHTML = count);
      if (decreasing === 0) {
        document.querySelector(".count-num").innerHTML =
          "Only 250 characters can be used";
      }
    }
  } catch (error) {
    console.log(error);
  }
});

