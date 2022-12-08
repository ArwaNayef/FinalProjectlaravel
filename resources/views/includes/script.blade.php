<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script>
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
        type: "bar",
        data: {
            labels: [1, 2, 3, 10, 12, 13, 14, 17, 21, 22, 25],
            datasets: [{
                label: "Purchase",
                tension: 0.4,
                borderWidth: 0,
                borderRadius: 4,
                borderSkipped: false,
                backgroundColor: "rgba(255, 255, 255, .8)",
                data: [2, 1, 1, 2, 1, 2, 1, 1, 1, 1, 2],
                maxBarThickness: 6
            },],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                }
            },
            interaction: {
                intersect: false,
                mode: 'index',
            },
            scales: {
                y: {
                    grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5],
                        color: 'rgba(255, 255, 255, .2)'
                    },
                    ticks: {
                        suggestedMin: 0,
                        suggestedMax: 500,
                        beginAtZero: true,
                        padding: 10,
                        font: {
                            size: 14,
                            weight: 300,
                            family: "Roboto",
                            style: 'normal',
                            lineHeight: 2
                        },
                        color: "#fff"
                    },
                },
                x: {
                    grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5],
                        color: 'rgba(255, 255, 255, .2)'
                    },
                    ticks: {
                        display: true,
                        color: '#f8f9fa',
                        padding: 10,
                        font: {
                            size: 14,
                            weight: 300,
                            family: "Roboto",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
            },
        },
    });

    var ctx2 = document.getElementById("chart-line").getContext("2d");

    new Chart(ctx2, {
        type: "line",
        data: {
            labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                label: "Mobile apps",
                tension: 0,
                borderWidth: 0,
                pointRadius: 5,
                pointBackgroundColor: "rgba(255, 255, 255, .8)",
                pointBorderColor: "transparent",
                borderColor: "rgba(255, 255, 255, .8)",
                borderColor: "rgba(255, 255, 255, .8)",
                borderWidth: 4,
                backgroundColor: "transparent",
                fill: true,
                data: [50, 40, 300, 320, 500, 350, 200, 230, 500],
                maxBarThickness: 6

            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                }
            },
            interaction: {
                intersect: false,
                mode: 'index',
            },
            scales: {
                y: {
                    grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5],
                        color: 'rgba(255, 255, 255, .2)'
                    },
                    ticks: {
                        display: true,
                        color: '#f8f9fa',
                        padding: 10,
                        font: {
                            size: 14,
                            weight: 300,
                            family: "Roboto",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
                x: {
                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                        borderDash: [5, 5]
                    },
                    ticks: {
                        display: true,
                        color: '#f8f9fa',
                        padding: 10,
                        font: {
                            size: 14,
                            weight: 300,
                            family: "Roboto",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
            },
        },
    });

    var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

    new Chart(ctx3, {
        type: "line",
        data: {
            labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                label: "Mobile apps",
                tension: 0,
                borderWidth: 0,
                pointRadius: 5,
                pointBackgroundColor: "rgba(255, 255, 255, .8)",
                pointBorderColor: "transparent",
                borderColor: "rgba(255, 255, 255, .8)",
                borderWidth: 4,
                backgroundColor: "transparent",
                fill: true,
                data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                maxBarThickness: 6

            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                }
            },
            interaction: {
                intersect: false,
                mode: 'index',
            },
            scales: {
                y: {
                    grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5],
                        color: 'rgba(255, 255, 255, .2)'
                    },
                    ticks: {
                        display: true,
                        padding: 10,
                        color: '#f8f9fa',
                        font: {
                            size: 14,
                            weight: 300,
                            family: "Roboto",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
                x: {
                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                        borderDash: [5, 5]
                    },
                    ticks: {
                        display: true,
                        color: '#f8f9fa',
                        padding: 10,
                        font: {
                            size: 14,
                            weight: 300,
                            family: "Roboto",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
            },
        },
    });
</script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;

    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>

<script src="{{ asset('assets/js/material-dashboard.min.js?v=3.0.4') }}"></script>
@yield('script')
{{--<script>--}}
{{--    (function(a, s, y, n, c, h, i, d, e) {--}}
{{--        s.className += ' ' + y;--}}
{{--        h.start = 1 * new Date;--}}
{{--        h.end = i = function() {--}}
{{--            s.className = s.className.replace(RegExp(' ?' + y), '')--}}
{{--        };--}}
{{--        (a[n] = a[n] || []).hide = h;--}}
{{--        setTimeout(function() {--}}
{{--            i();--}}
{{--            h.end = null--}}
{{--        }, c);--}}
{{--        h.timeout = c;--}}
{{--    })(window, document.documentElement, 'async-hide', 'dataLayer', 4000, {--}}
{{--        'GTM-K9BGS8K': true--}}
{{--    });--}}
{{--</script>--}}

{{--<script>--}}
{{--    (function(i, s, o, g, r, a, m) {--}}
{{--        i['GoogleAnalyticsObject'] = r;--}}
{{--        i[r] = i[r] || function() {--}}
{{--            (i[r].q = i[r].q || []).push(arguments)--}}
{{--        }, i[r].l = 1 * new Date();--}}
{{--        a = s.createElement(o),--}}
{{--            m = s.getElementsByTagName(o)[0];--}}
{{--        a.async = 1;--}}
{{--        a.src = g;--}}
{{--        m.parentNode.insertBefore(a, m)--}}
{{--    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');--}}
{{--    ga('create', 'UA-46172202-22', 'auto', {--}}
{{--        allowLinker: true--}}
{{--    });--}}
{{--    ga('set', 'anonymizeIp', true);--}}
{{--    ga('require', 'GTM-K9BGS8K');--}}
{{--    ga('require', 'displayfeatures');--}}
{{--    ga('require', 'linker');--}}
{{--    ga('linker:autoLink', ["2checkout.com", "avangate.com"]);--}}
{{--</script>--}}


{{--<script>--}}
{{--    (function(w, d, s, l, i) {--}}
{{--        w[l] = w[l] || [];--}}
{{--        w[l].push({--}}
{{--            'gtm.start': new Date().getTime(),--}}
{{--            event: 'gtm.js'--}}
{{--        });--}}
{{--        var f = d.getElementsByTagName(s)[0],--}}
{{--            j = d.createElement(s),--}}
{{--            dl = l != 'dataLayer' ? '&l=' + l : '';--}}
{{--        j.async = true;--}}
{{--        j.src =--}}
{{--            'https://www.googletagmanager.com/gtm.js?id=' + i + dl;--}}
{{--        f.parentNode.insertBefore(j, f);--}}
{{--    })(window, document, 'script', 'dataLayer', 'GTM-NKDMSK6');--}}
{{--</script>--}}


{{--<script>--}}
{{--    var win = navigator.platform.indexOf('Win') > -1;--}}
{{--    if (win && document.querySelector('#sidenav-scrollbar')) {--}}
{{--        var options = {--}}
{{--            damping: '0.5'--}}
{{--        }--}}
{{--        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);--}}
{{--    }--}}
{{--</script>--}}


{{--<script src="{{ asset('assets/js/material-dashboard.min.js?v=3.0.5') }}"></script>--}}
{{--<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993"--}}
{{--        integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA=="--}}
{{--        data-cf-beacon='{"rayId":"76c2de8fb957995a","version":"2022.11.0","r":1,"token":"1b7cbb72744b40c580f8633c6b62637e","si":100}'--}}
{{--        crossorigin="anonymous"></script>--}}
