// Navbar, Light & Dark Theme
const body = document.querySelector("body"),
    nav = document.querySelector("nav"),
    modeToggle = document.querySelector(".dark-light"),
    searchToggle = document.querySelector(".searchToggle"),
    sidebarOpen = document.querySelector(".sidebarOpen"),
    siderbarClose = document.querySelector(".siderbarClose");

let getMode = localStorage.getItem("mode");
if (getMode && getMode === "dark-mode") {
    body.classList.add("dark");
}

// js code to toggle dark and light mode
modeToggle.addEventListener("click", () => {
    modeToggle.classList.toggle("active");
    body.classList.toggle("dark");

    // js code to keep user selected mode even page refresh or file reopen
    if (!body.classList.contains("dark")) {
        localStorage.setItem("mode", "light-mode");
    } else {
        localStorage.setItem("mode", "dark-mode");
    }
});

// js code to toggle search box
searchToggle.addEventListener("click", () => {
    searchToggle.classList.toggle("active");
});

//   js code to toggle sidebar
sidebarOpen.addEventListener("click", () => {
    nav.classList.add("active");
});

body.addEventListener("click", (e) => {
    let clickedElm = e.target;

    if (
        !clickedElm.classList.contains("sidebarOpen") &&
        !clickedElm.classList.contains("menu")
    ) {
        nav.classList.remove("active");
    }
});

$(function () {
    $(".genealogy-tree ul").hide();
    $(".genealogy-tree>ul").show();
    $(".genealogy-tree ul.active").show();
    $(".genealogy-tree li a").on("click", function (e) {
        var children = $(this).siblings("ul");
        if (children.is(":visible"))
            children.hide("fast").removeClass("active");
        else children.show("fast").addClass("active");
        e.stopPropagation();
    });
});

// $(function () {
//     $(".genealogy-tree ul").hide();
//     $(".genealogy-tree>ul").show();
//     $(".genealogy-tree ul.active").show();
//     $(".genealogy-tree li a").on("click", function (e) {
//         var children = $(this).parent().siblings("ul");
//         if (children.is(":visible"))
//             children.hide("fast").removeClass("active");
//         else children.show("fast").addClass("active");
//         e.stopPropagation();
//     });
// });

// Drag to Scroll for Genealogy
const geneContainer = document.querySelector("#items-container");

let startY;
let startX;
let scrollLeft;
let scrollTop;
let isDown;

geneContainer.addEventListener("mousedown", (e) => mouseIsDown(e));
geneContainer.addEventListener("mouseup", (e) => mouseUp(e));
geneContainer.addEventListener("mouseleave", (e) => mouseLeave(e));
geneContainer.addEventListener("mousemove", (e) => mouseMove(e));

function mouseIsDown(e) {
    isDown = true;
    startY = e.pageY - geneContainer.offsetTop;
    startX = e.pageX - geneContainer.offsetLeft;
    scrollLeft = geneContainer.scrollLeft;
    scrollTop = geneContainer.scrollTop;
    geneContainer.style.cursor = "grabbing";
}
function mouseUp(e) {
    isDown = false;
    geneContainer.style.cursor = "grab";
}
function mouseLeave(e) {
    isDown = false;
    geneContainer.style.cursor = "grab";
}
function mouseMove(e) {
    if (isDown) {
        e.preventDefault();
        //Move vertcally
        const y = e.pageY - geneContainer.offsetTop;
        const walkY = y - startY;
        geneContainer.scrollTop = scrollTop - walkY;

        //Move Horizontally
        const x = e.pageX - geneContainer.offsetLeft;
        const walkX = x - startX;
        geneContainer.scrollLeft = scrollLeft - walkX;
    }
}

$(document).ready(function () {
    $(".action").on("click", ".fullscreen", function () {
        $(".generation-column").toggle();
        $(this).removeClass("fullscreen");
        $(this).addClass("exit-fullscreen");
        $(this).children("i").removeClass("bx-fullscreen");
        $(this).children("i").addClass("bx-exit-fullscreen");
    });
    $(".action").on("click", ".exit-fullscreen", function () {
        $(".generation-column").toggle();
        $(this).removeClass("exit-fullscreen");
        $(this).addClass("fullscreen");
        $(this).children("i").removeClass("bx-exit-fullscreen");
        $(this).children("i").addClass("bx-fullscreen");
    });

    var mt = 0;
    var ml = 0;
    $(".zoom-in").on("click", function () {
        var scale = $(".genealogy-tree").css("scale");
        var scales = parseFloat(scale);
        if (scales < 3) {
            if (scales >= 1) {
                mt = mt + 30;
                ml = ml + 50;
            }
            scales = scales + 0.2;
            scales = scales.toFixed(1);
            $(".genealogy-tree").attr(
                "style",
                "margin:" + mt + "px 0 0 " + ml + "px;scale:" + scales
            );
        } else {
            return false;
        }
    });

    $(".zoom-out").on("click", function () {
        var scale = $(".genealogy-tree").css("scale");
        var scales = parseFloat(scale);
        if (scales > 0.3) {
            if (scales > 1) {
                mt = mt - 30;
                ml = ml - 50;
            }
            scales = scales - 0.2;
            scales = scales.toFixed(1);
            $(".genealogy-tree").attr(
                "style",
                "margin:" + mt + "px 0 0 " + ml + "px;scale:" + scales
            );
        } else {
            return false;
        }
    });

    $(".reset-zoom").on("click", function () {
        $(".genealogy-tree").removeAttr("style");
        $(".genealogy-tree").attr("style", "scale:1");
    });

    $("#gen0").on("click", function () {
        let gen = $(".genealogy-body").attr("class");
        if (gen == "body genealogy-body genealogy-scroll hidden") {
            $(".genealogy-body").removeClass("hidden");
            $(".generation-0").addClass("hidden");
            $(this).attr("style", "");
            $("#gen1").attr("style", "");
            $("#gen2").attr("style", "");
            $("#gen3").attr("style", "");
            $("#gen4").attr("style", "");
            $(".actions-column").attr("style", "");
        } else {
            $(".genealogy-body").addClass("hidden");
            $(".generation-0").removeClass("hidden");
            $(this).attr("style", "background-color:var(--hover-color);");
            $("#gen1").attr("style", "display:none;");
            $("#gen2").attr("style", "display:none;");
            $("#gen3").attr("style", "display:none;");
            $(".actions-column").attr("style", "display:none;");
        }
    });
    $("#gen1").on("click", function () {
        let gen = $(".genealogy-body").attr("class");
        if (gen == "body genealogy-body genealogy-scroll hidden") {
            $(".genealogy-body").removeClass("hidden");
            $(".generation-1").addClass("hidden");
            $(this).attr("style", "");
            $("#gen0").attr("style", "");
            $("#gen2").attr("style", "");
            $("#gen3").attr("style", "");
            $("#gen4").attr("style", "");
            $(".actions-column").attr("style", "");
        } else {
            $(".genealogy-body").addClass("hidden");
            $(".generation-1").removeClass("hidden");
            $(this).attr("style", "background-color:var(--hover-color);");
            $("#gen0").attr("style", "display:none;");
            $("#gen2").attr("style", "display:none;");
            $("#gen3").attr("style", "display:none;");
            $(".actions-column").attr("style", "display:none;");
        }
    });
    $("#gen2").on("click", function () {
        let gen = $(".genealogy-body").attr("class");
        if (gen == "body genealogy-body genealogy-scroll hidden") {
            $(".genealogy-body").removeClass("hidden");
            $(".generation-2").addClass("hidden");
            $(this).attr("style", "");
            $("#gen1").attr("style", "");
            $("#gen0").attr("style", "");
            $("#gen3").attr("style", "");
            $("#gen4").attr("style", "");
            $(".actions-column").attr("style", "");
        } else {
            $(".genealogy-body").addClass("hidden");
            $(".generation-2").removeClass("hidden");
            $(this).attr("style", "background-color:var(--hover-color);");
            $("#gen1").attr("style", "display:none;");
            $("#gen0").attr("style", "display:none;");
            $("#gen3").attr("style", "display:none;");
            $(".actions-column").attr("style", "display:none;");
        }
    });
    $("#gen3").on("click", function () {
        let gen = $(".genealogy-body").attr("class");
        if (gen == "body genealogy-body genealogy-scroll hidden") {
            $(".genealogy-body").removeClass("hidden");
            $(".generation-3").addClass("hidden");
            $(this).attr("style", "");
            $("#gen1").attr("style", "");
            $("#gen2").attr("style", "");
            $("#gen0").attr("style", "");
            $("#gen4").attr("style", "");
            $(".actions-column").attr("style", "");
        } else {
            $(".genealogy-body").addClass("hidden");
            $(".generation-3").removeClass("hidden");
            $(this).attr("style", "background-color:var(--hover-color);");
            $("#gen1").attr("style", "display:none;");
            $("#gen2").attr("style", "display:none;");
            $("#gen0").attr("style", "display:none;");
            $(".actions-column").attr("style", "display:none;");
        }
    });
});
