$(document).ready(function () {
    setBackground();
    // cus and prod data array
    var customer_arr = [];
    var product_arr = [];
    var cus_id = [];
    var prod_id = [];

    // ajax call for getting participants and gift from server 
    $.ajax({
        url: "getCustomer",
        method: "GET",
        success: function (data) {
            // console.log(data);
            $.each(data.customer, function (i, v) {
                var name = v.name;
                var id = v.id;

                customer_arr.push(name);
                cus_id.push(id);
            });

            $.each(data.product, function (i, v) {
                var name = v.name;
                var id = v.id;

                product_arr.push(name);
                prod_id.push(id);
            });

            initializeSlotMachine();
        },
    });
    // changing theme color 
    function setBackground() {
        // Check if color values are stored in localStorage
        var storedThemeColor = localStorage.getItem("theme_color");

        // Initialize color variables
        var theme_color = storedThemeColor || "red";
        setThemeColor(theme_color);

        $("#theme_color").on("change", function () {
            theme_color = $("#theme_color").val();
            setThemeColor(theme_color);
        });
        // set theme color according to user choise
        function setThemeColor(color) {
            if (color === "red") {
                localStorage.setItem("theme_color", theme_color);
                $("#gradient").css({
                    background: "rgb(135,2,2)",
                    background:
                        "linear-gradient(0deg, rgba(135,2,2,1) 0%, rgba(255,169,169,1) 100%)",
                });
                $('.inside_box,.TwoColorBtn,#startSlot').css({
                    background: "rgb(226,160,160)",
                    background: "linear-gradient(0deg, rgba(226,160,160,1) 0%, rgba(255,255,255,1) 100%)",
                })
                $('*').css({
                    color : '#440000',
                });
                $(".customer_reel,.product_reel,#startSlot").css({
                    border: "8px solid #440000",
                })
                $(":root").css({
                    "--bg1":"rgba(226,160,160,1)",
                    "--color":"#440000",
                    "--table-bg":"rgba(255,255,255,1)",
                })
                $("#theme_color option[value=red]").attr("selected", true);
            } else if (theme_color === "blue") {
                localStorage.setItem("theme_color", theme_color);
                $("#gradient").css({
                    background: "rgb(7,37,73)",
                    background:
                        "linear-gradient(0deg, rgba(7,37,73,1) 0%, rgba(64,156,204,1) 100%)",
                });
                $(".inside_box,.TwoColorBtn,#startSlot").css({
                    background: "rgb(126,179,219)",
                    background:"linear-gradient(0deg, rgba(126,179,219,1) 0%, rgba(255,255,255,1) 100%)",
                })
                $('*').css({
                    color : '#00053d',
                });
                $(".customer_reel,.product_reel,#startSlot").css({
                    border: "8px solid #00053d",
                })
                $(":root").css({
                    "--bg1":"rgba(126,179,219,1)",
                    "--color":"#00053d",
                    "--table-bg":"rgba(255,255,255,1)",
                })
                $("#theme_color option[value=blue]").attr("selected", true);
            } else if (theme_color === "green") {
                localStorage.setItem("theme_color", theme_color);
                $("#gradient").css({
                    background: "rgb(12,240,30)",
                    background:
                        "linear-gradient(0deg, rgba(12,240,30,1) 0%, rgba(168,229,233,1) 100%)",
                });
                $(".inside_box,.TwoColorBtn,#startSlot").css({
                    background: "rgb(153,255,161)",
                    background:"linear-gradient(0deg, rgba(153,255,161,1) 0%, rgba(242,245,245,1) 100%)",
                })
                $('*').css({
                    color : '#02410a',
                });
                $(".customer_reel,.product_reel,#startSlot").css({
                    border: "8px solid #02410a",
                })
                $(":root").css({
                    "--bg1":"rgba(153,255,161,1)",
                    "--color":"#02410a",
                    "--table-bg":"rgba(242,245,245,1)",
                })
                $("#theme_color option[value=green]").attr("selected", true);
            } else if (theme_color === "orange") {
                localStorage.setItem("theme_color", theme_color);
                $("#gradient").css({
                    background: "rgb(208,48,0)",
                    background:
                        "linear-gradient(0deg, rgba(208,48,0,1) 0%, rgba(221,147,98,1) 100%)",
                });
                $(".inside_box,.TwoColorBtn,#startSlot").css({
                    background: "rgb(255,191,172)",
                    background:"linear-gradient(0deg, rgba(255,191,172,1) 0%, rgba(236,236,236,1) 100%)",
                })
                $('*').css({
                    color : '#755503',
                });
                $(".customer_reel,.product_reel,#startSlot").css({
                    border: "8px solid #755503",
                })
                $(":root").css({
                    "--bg1":"rgba(255,191,172,1)",
                    "--color":"#755503",
                    "--table-bg":"rgba(236,236,236,1)",
                })
                $("#theme_color option[value=orange]").attr("selected", true);
            } else if (theme_color === "indigo") {
                localStorage.setItem("theme_color", theme_color);
                $("#gradient").css({
                    background: "rgb(53,14,133)",
                    background:
                        "linear-gradient(0deg, rgba(53,14,133,1) 5%, rgba(198,170,235,1) 100%)",
                });
                $(".inside_box,.TwoColorBtn,#startSlot").css({
                    background: "rgb(174,138,250)",
                    background:"linear-gradient(0deg, rgba(174,138,250,1) 5%, rgba(226,213,242,1) 100%)",
                })
                $('*').css({
                    color : '#1c024f',
                });
                $(".customer_reel,.product_reel,#startSlot").css({
                    border: "8px solid #1c024f",
                })
                $(":root").css({
                    "--bg1":"rgba(174,138,250,1)",
                    "--color":"#1c024f",
                    "--table-bg":"rgba(226,213,242,1)",
                })
                $("#theme_color option[value=indigo]").attr("selected", true);
            }  else if (theme_color === "violet") {
                localStorage.setItem("theme_color", theme_color);
                $("#gradient").css({
                    background: "rgb(184,33,178)",
                    background:
                        "linear-gradient(0deg, rgba(184,33,178,1) 0%, rgba(226,119,225,1) 100%)",
                });
                $(".inside_box,.TwoColorBtn,#startSlot").css({
                    background: "rgb(228,156,225)",
                    background:"linear-gradient(0deg, rgba(228,156,225,1) 0%, rgba(254,243,254,1) 100%)",
                })
                $('*').css({
                    color : '#4a024f',
                });
                $(".customer_reel,.product_reel,#startSlot").css({
                    border: "8px solid #4a024f",
                })
                $(":root").css({
                    "--bg1":"rgba(228,156,225,1)",
                    "--color":"#4a024f",
                    "--table-bg":"rgba(254,243,254,1)"
                })
                $("#theme_color option[value=violet]").attr("selected", true);
            } else {
                localStorage.setItem("theme_color", theme_color);
                $("#gradient").css({
                    background: "rgb(135,2,2)",
                    background:
                        "linear-gradient(0deg, rgba(135,2,2,1) 0%, rgba(255,169,169,1) 100%)",
                });
                $('.inside_box,.TwoColorBtn,#startSlot').css({
                    background: "rgb(226,160,160)",
                    background: "linear-gradient(0deg, rgba(226,160,160,1) 0%, rgba(255,255,255,1) 100%)",
                })
                $('*').css({
                    color : '#00053d',
                });
                $(".customer_reel,.product_reel,#startSlot").css({
                    border: "8px solid #00053d",
                })
                $(":root").css({
                    "--bg1":"rgba(226,160,160,1)",
                    "--color":"#00053d",
                    "--table-bg":"rgba(255,255,255,1)",
                })
                $("#theme_color option[value=red]").attr("selected", true);
            }
            
        }
        // theme toggler
        $(".chbg").click(function () {
            $(".chbgbox").toggleClass("hidden");
        });
    }
    // slot machine
    function initializeSlotMachine() {
        var customer_length = customer_arr.length;
        var product_length = product_arr.length;
        var customer_height = customer_length * 350;
        var product_height = product_length * 350;
        var customer_divider = customer_height / customer_length;
        var product_divider = product_height / product_length;

        var tMax = 3000;
        var speeds = [];
        var r_c = [];
        var r_p = [];
        var customer_start, product_start;
        var customer_reels, product_reels;

        function initial() {
            customer_reels = $(".customer_reel").each(function (i, v) {
                v.innerHTML =
                    "<div><p>" +
                    customer_arr.join("</p><p>") +
                    "</p></div><div><p>" +
                    customer_arr.join("</p><p>") +
                    "</p></div><div><p>" +
                    customer_arr.join("</p><p>") +
                    "</p></div>";
            });

            product_reels = $(".product_reel").each(function (i, v) {
                v.innerHTML =
                    "<div><p>" +
                    product_arr.join("</p><p>") +
                    "</p></div><div><p>" +
                    product_arr.join("</p><p>") +
                    "</p></div><div><p>" +
                    product_arr.join("</p><p>") +
                    "</p></div>";
            });

            $("#startSlot").click(action);
        }

        function action() {
            for (var i = 0; i < 2; ++i) {
                speeds[i] = Math.random() + 2.5;
                r_c[i] =
                    (((Math.random() * customer_length) | 0) *
                        customer_height) /
                    customer_length;

                r_p[i] =
                    (((Math.random() * product_length) | 0) * product_height) /
                    product_length;
            }

            $("#startSlot").toggleClass("hidden");
            $(".TwoColorBtn").css({
                opacity: 0,
            });

            customer_animate();
            setTimeout(() => {
                product_animate();
            }, 600);
        }

        function customer_animate(now) {
            if (!customer_start) {
                customer_start = now;
            }

            var t = now - customer_start || 0;
            for (var i = 0; i < 2; ++i) {
                var current_reel = customer_reels[i];
                if (current_reel) {
                    customer_reels[i].scrollTop =
                        ((speeds[i] / tMax / 0.5) * (tMax - t) * (tMax - t) +
                            r_c[i]) %
                            customer_height |
                        0;
                }
            }

            if (t < tMax) {
                requestAnimationFrame(customer_animate);
            } else {
                customer_start = undefined;
                customer_check();
            }
        }

        function product_animate(now) {
            if (!product_start) {
                product_start = now;
            }

            var t = now - product_start || 0;
            for (var i = 0; i < 2; ++i) {
                var current_reel = product_reels[i];
                if (current_reel) {
                    product_reels[i].scrollTop =
                        ((speeds[i] / tMax / 0.5) * (tMax - t) * (tMax - t) +
                            r_p[i]) %
                            product_height |
                        0;
                }
            }

            if (t < tMax) {
                requestAnimationFrame(product_animate);
            } else {
                product_start = undefined;
                product_check();
            }
        }

        function customer_check() {
            $("#cus_id").val(
                cus_id[(r_c[0] / customer_divider + 1) % customer_length | 0]
            );
        }

        function product_check() {
            $("#prod_id").val(
                prod_id[(r_p[0] / product_divider + 1) % product_length | 0]
            );
            winner_effect();
            setTimeout(saveWinner, 3000);
        }

        function saveWinner() {
            var cus_id = $("#cus_id").val();
            var prod_id = $("#prod_id").val();

            console.log(cus_id, prod_id);
            $.ajax({
                url: "uploadWinner",
                method: "POST",
                data: { cus_id, prod_id },
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                success: function () {
                    // console.log("Successfully Saved Winner");
                    location.reload();
                },
            });
        }

        function winner_effect() {
            let W = window.innerWidth;
            let H = window.innerHeight;
            const canvas = document.getElementById("canvas");
            const context = canvas.getContext("2d");
            const maxConfettis = 150;
            const particles = [];

            const possibleColors = [
                "DodgerBlue",
                "OliveDrab",
                "Gold",
                "Pink",
                "SlateBlue",
                "LightBlue",
                "Gold",
                "Violet",
                "PaleGreen",
                "SteelBlue",
                "SandyBrown",
                "Chocolate",
                "Crimson",
            ];

            function randomFromTo(from, to) {
                return Math.floor(Math.random() * (to - from + 1) + from);
            }

            function confettiParticle() {
                this.x = Math.random() * W; // x
                this.y = Math.random() * H - H; // y
                this.r = randomFromTo(11, 33); // radius
                this.d = Math.random() * maxConfettis + 11;
                this.color =
                    possibleColors[
                        Math.floor(Math.random() * possibleColors.length)
                    ];
                this.tilt = Math.floor(Math.random() * 33) - 11;
                this.tiltAngleIncremental = Math.random() * 0.07 + 0.05;
                this.tiltAngle = 0;

                this.draw = function () {
                    context.beginPath();
                    context.lineWidth = this.r / 2;
                    context.strokeStyle = this.color;
                    context.moveTo(this.x + this.tilt + this.r / 3, this.y);
                    context.lineTo(
                        this.x + this.tilt,
                        this.y + this.tilt + this.r / 5
                    );
                    return context.stroke();
                };
            }

            function Draw() {
                const results = [];

                // Magical recursive functional love
                requestAnimationFrame(Draw);

                context.clearRect(0, 0, W, window.innerHeight);

                for (var i = 0; i < maxConfettis; i++) {
                    results.push(particles[i].draw());
                }

                let particle = {};
                let remainingFlakes = 0;
                for (var i = 0; i < maxConfettis; i++) {
                    particle = particles[i];

                    particle.tiltAngle += particle.tiltAngleIncremental;
                    particle.y +=
                        (Math.cos(particle.d) + 3 + particle.r / 2) / 2;
                    particle.tilt = Math.sin(particle.tiltAngle - i / 3) * 15;

                    if (particle.y <= H) remainingFlakes++;

                    // If a confetti has fluttered out of view,
                    // bring it back to above the viewport and let if re-fall.
                    if (
                        particle.x > W + 30 ||
                        particle.x < -30 ||
                        particle.y > H
                    ) {
                        particle.x = Math.random() * W;
                        particle.y = -30;
                        particle.tilt = Math.floor(Math.random() * 10) - 20;
                    }
                }

                return results;
            }

            window.addEventListener(
                "resize",
                function () {
                    W = window.innerWidth;
                    H = window.innerHeight;
                    canvas.width = window.innerWidth;
                    canvas.height = window.innerHeight;
                },
                false
            );

            // Push new confetti objects to `particles[]`
            for (var i = 0; i < maxConfettis; i++) {
                particles.push(new confettiParticle());
            }

            // Initialize
            canvas.width = W;
            canvas.height = H;
            Draw();
        }

        initial();
    }
    //datatable parts
    $("#myTable").DataTable({
        dom: "Bfrtip",
        buttons: [
            "copy",
            "csv",
            "excel",
            "pdf",
            {
                extend: "print",
                customize: function (win) {
                    $(win.document.body).css("background", "white");
                },
            },
        ],
        ordering: false,
    });
    $("#CusTB").DataTable({
        ordering: false,
    });
    $("#productTB").DataTable({
        ordering: false,
    });
});
