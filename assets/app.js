import $ from 'jquery';
import './bootstrap.js';
import './styles/style.css';

$(document).ready(function() {

    //HEADER MENU
    let button = $('.header_nav button');
    button.on('click', function () {
        window.location.href = $(this).val();
    });

    //HEADER LANG MENU
    let lang = $('.dropdown-lang .dropdown-item');
    lang.on('click', function() {
        let l = $(this).attr('aria-label');
        let lpath = $(this).attr('aria-path');
        if (l === 'en' || l === 'es') {
            window.location.href = lpath;
        }

    })

    // DARK / CLEAR
    let clear_dark = $('#clear_dark');
    clear_dark.on('click', function() {

        // BUTTON
        let elem = $(this);
        // BUTTONS
        let btns = $('.custom_btn')
        // HEADER / FOOTER
        let hefo = $('header, footer');
        // MAIN
        let main = $('main');
        if (elem.hasClass('clear_btn')) { // FOR DARK
            // BUTTONS
            btns.removeClass('clear_btn').addClass('dark_btn');
            // HEADER / FOOTER
            hefo.removeClass('bg-dark text-light').addClass('bg-light text-dark');
            // MAIN
            main.removeClass('bg-light text-dark').addClass('bg-dark text-light');

        } else if (elem.hasClass('dark_btn')) { // FOR LIGHT
            // BUTTONS
            btns.removeClass('dark_btn').addClass('clear_btn');
            // HEADER / FOOTER
            hefo.removeClass('bg-light text-dark').addClass('bg-dark text-light');
            // MAIN
            main.removeClass('bg-dark text-light').addClass('bg-light text-dark');

        }
    })

    // BUTTON GO TOP
    let btnTop = $('.btn-go-top');
    btnTop.click(function () {
        window.scrollTo(0, 0);
    })

    // DOWNLOAD CV BUTTON
    let downloadButton = $('.downloadCV');
    downloadButton.on('click', function(){
        let filePath;
        if (/^\/es\/.*/.test(window.location.pathname)) {
            filePath = "build/files/CV_es.pdf"
        } else if (/^\/en\/.*/.test(window.location.pathname)) {
            filePath = "build/files/CV_en.pdf"
        }
        if (filePath) {
            const link = $('<a>')
                .attr('href', filePath)
                .attr('download', filePath.split('/').pop())
                .appendTo('body');
            link[0].click();
            link.remove();
        } else {
            console.error("No file found");
        }

    });
})