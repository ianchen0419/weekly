/*!
 * JavaScript Cookie v2.2.0
 * https://github.com/js-cookie/js-cookie
 *
 * Copyright 2006, 2015 Klaus Hartl & Fagner Brack
 * Released under the MIT license
 */
;
(function (factory) {
    var registeredInModuleLoader = false;
    if (typeof define === 'function' && define.amd) {
        define(factory);
        registeredInModuleLoader = true;
    }
    if (typeof exports === 'object') {
        module.exports = factory();
        registeredInModuleLoader = true;
    }
    if (!registeredInModuleLoader) {
        var OldCookies = window.Cookies;
        var api = window.Cookies = factory();
        api.noConflict = function () {
            window.Cookies = OldCookies;
            return api;
        };
    }
}(function () {
    function extend() {
        var i = 0;
        var result = {};
        for (; i < arguments.length; i++) {
            var attributes = arguments[i];
            for (var key in attributes) {
                result[key] = attributes[key];
            }
        }
        return result;
    }
    function init(converter) {
        function api(key, value, attributes) {
            var result;
            if (typeof document === 'undefined') {
                return;
            }
            // Write
            if (arguments.length > 1) {
                attributes = extend({
                    path: '/'
                }, api.defaults, attributes);
                if (typeof attributes.expires === 'number') {
                    var expires = new Date();
                    expires.setMilliseconds(expires.getMilliseconds() + attributes.expires * 864e+5);
                    attributes.expires = expires;
                }
                // We're using "expires" because "max-age" is not supported by IE
                attributes.expires = attributes.expires ? attributes.expires.toUTCString() : '';
                try {
                    result = JSON.stringify(value);
                    if (/^[\{\[]/.test(result)) {
                        value = result;
                    }
                }
                catch (e) { }
                if (!converter.write) {
                    value = encodeURIComponent(String(value))
                        .replace(/%(23|24|26|2B|3A|3C|3E|3D|2F|3F|40|5B|5D|5E|60|7B|7D|7C)/g, decodeURIComponent);
                }
                else {
                    value = converter.write(value, key);
                }
                key = encodeURIComponent(String(key));
                key = key.replace(/%(23|24|26|2B|5E|60|7C)/g, decodeURIComponent);
                key = key.replace(/[\(\)]/g, escape);
                var stringifiedAttributes = '';
                for (var attributeName in attributes) {
                    if (!attributes[attributeName]) {
                        continue;
                    }
                    stringifiedAttributes += '; ' + attributeName;
                    if (attributes[attributeName] === true) {
                        continue;
                    }
                    stringifiedAttributes += '=' + attributes[attributeName];
                }
                return (document.cookie = key + '=' + value + stringifiedAttributes);
            }
            // Read
            if (!key) {
                result = {};
            }
            // To prevent the for loop in the first place assign an empty array
            // in case there are no cookies at all. Also prevents odd result when
            // calling "get()"
            var cookies = document.cookie ? document.cookie.split('; ') : [];
            var rdecode = /(%[0-9A-Z]{2})+/g;
            var i = 0;
            for (; i < cookies.length; i++) {
                var parts = cookies[i].split('=');
                var cookie = parts.slice(1).join('=');
                if (!this.json && cookie.charAt(0) === '"') {
                    cookie = cookie.slice(1, -1);
                }
                try {
                    var name = parts[0].replace(rdecode, decodeURIComponent);
                    cookie = converter.read ?
                        converter.read(cookie, name) : converter(cookie, name) ||
                        cookie.replace(rdecode, decodeURIComponent);
                    if (this.json) {
                        try {
                            cookie = JSON.parse(cookie);
                        }
                        catch (e) { }
                    }
                    if (key === name) {
                        result = cookie;
                        break;
                    }
                    if (!key) {
                        result[name] = cookie;
                    }
                }
                catch (e) { }
            }
            return result;
        }
        api.set = api;
        api.get = function (key) {
            return api.call(api, key);
        };
        api.getJSON = function () {
            return api.apply({
                json: true
            }, [].slice.call(arguments));
        };
        api.defaults = {};
        api.remove = function (key, attributes) {
            api(key, '', extend(attributes, {
                expires: -1
            }));
        };
        api.withConverter = init;
        return api;
    }
    return init(function () { });
}));
// JavaScript Document
/**
 * 使用javascriptライブラリ
 * Modernizr
 * TweenMax
 * Swiper
 */
var img = document.getElementsByTagName('img');
var imgNum = img.length;
// SVGがダメなブラウザは<img>タグのSVGファイルはpngに変換
function svgTopng() {
    //console.log(img)
    if (!Modernizr.svg) {
        for (var i = 0; i < imgNum; i++) {
            var src = img[i].getAttribute('src'), reSrc = src.replace(/\.svg/gi, '.png');
            img[i].setAttribute('src', reSrc);
        }
    }
    return;
}
;
// 変数リスト
const mainBlock = document.getElementById('main'), pagetitle = document.getElementById('title');
// mobile
const mq = [], mobilemaxwidth = '(max-width: 680px)', mobileminwidth = '(min-width: 680px)';
mq.mobile = Modernizr.mq(mobilemaxwidth);
mq.pc = Modernizr.mq(mobileminwidth);
let navisub = document.getElementById('navi-sub'), navisubElm = navisub.getElementsByTagName('li'), navimain = document.getElementById('navi-main'), navimainElm = navimain.getElementsByTagName('li'), naviwrap = document.getElementById('header-navi');
let mobileMenu = document.createElement('div'), mobileUl = document.createElement('ul'), mobileMenuClose = document.createElement('div'), wrap = document.createDocumentFragment(), mobileMenuBt = document.createElement('div');
mobileMenuClose.setAttribute('id', 'mobilenavi-main-close');
mobileMenu.setAttribute('id', 'mobilenavi-main');
mobileMenuBt.setAttribute('id', 'mobilenavi-main-bt');
function naviClickFunc() {
    mobileMenuBt.addEventListener('click', function (ev) {
        // mobileMenu.style.display = 'block';
        TweenMax.to(mobileMenu, 0.3, {
            display: 'block',
            opacity: 1,
            height: '100%'
        });
        document.body.style.overflow = 'hidden';
        document.body.style.height = '100%';
        document.getElementsByTagName('html')[0].style.overflow = 'hidden';
    });
    mobileMenu.addEventListener('click', function (ev) {
        // mobileMenu.style.display = 'none';
        TweenMax.to(mobileMenu, 0.3, {
            display: 'none',
            opacity: 0,
            height: 0
        });
        document.body.style.overflow = 'visible';
        document.body.style.height = 'auto';
        document.getElementsByTagName('html')[0].style.overflow = 'visible';
    });
    mobileMenuClose.addEventListener('click', function (ev) {
        // mobileMenu.style.display = 'none';
        TweenMax.to(mobileMenu, 0.3, {
            display: 'none',
            opacity: 0,
            height: 0
        });
        document.body.style.overflow = 'visible';
        document.body.style.height = 'auto';
        document.getElementsByTagName('html')[0].style.overflow = 'visible';
    });
}
;
function mobilenaviFunc() {
    let naviElm = document.createDocumentFragment(), currentPosition = window.scrollY;
    function naviMli(lielm) {
        for (var i = 0; i < lielm.length; i++) {
            let nsli = lielm[i].cloneNode(true);
            naviElm.appendChild(nsli);
        }
        return lielm;
    }
    naviMli(navimainElm);
    function naviSli(lielm) {
        for (var i = 0; i < lielm.length; i++) {
            let nsli = lielm[i].cloneNode(true);
            naviElm.appendChild(nsli);
        }
        return lielm;
    }
    naviSli(navisubElm);
    mobileMenu.appendChild(mobileUl);
    mobileMenu.appendChild(mobileMenuClose);
    mobileUl.appendChild(naviElm);
    wrap.appendChild(mobileMenu);
    document.body.appendChild(wrap);
    mobileMenuBt.setAttribute('id', 'mobilenavi-main-bt');
    document.body.appendChild(mobileMenuBt);
    if (mq.mobile) {
        // navisub.style.display = 'none';
        // navimain.style.display = 'none';
        // mobileMenu.style.display = 'none';
        TweenMax.set(navisub, {
            display: 'none'
        });
        TweenMax.set(navimain, {
            display: 'none'
        });
        TweenMax.set(mobileMenu, {
            display: 'none',
            opacity: 0,
            height: 0
        });
        naviClickFunc();
    }
    else if (mq.pc) {
        TweenMax.to(navisub, 0, {
            display: 'flex'
        });
        TweenMax.to(navimain, 0, {
            display: 'flex'
        });
        TweenMax.to(mobileMenu, 0, {
            display: 'none'
        });
        TweenMax.to(mobileMenuBt, 0, {
            display: 'none'
        });
    }
}
;
mobilenaviFunc();
let resizeTimer, interval = 300;
window.addEventListener('resize', function (ev) {
    if (resizeTimer !== false) {
        clearTimeout(resizeTimer);
    }
    resizeTimer = setTimeout(function () {
        mq.mobile = Modernizr.mq(mobilemaxwidth);
        mq.pc = Modernizr.mq(mobileminwidth);
        if (mq.mobile) {
            TweenMax.set(navisub, {
                display: 'none'
            });
            TweenMax.set(navimain, {
                display: 'none'
            });
            TweenMax.set(mobileMenu, {
                display: 'none'
            });
            TweenMax.set(mobileMenuBt, {
                display: 'block'
            });
            naviClickFunc();
        }
        else if (mq.pc) {
            TweenMax.set(navisub, {
                display: 'flex'
            });
            TweenMax.set(navimain, {
                display: 'flex'
            });
            TweenMax.set(mobileMenu, {
                display: 'none'
            });
            TweenMax.set(mobileMenuBt, {
                display: 'none'
            });
        }
    }, interval);
});
// qabox
let qabox = document.getElementsByClassName('qabox');
function qaFunc(qaElm) {
    for (let i = 0; i < qaElm.length; i++) {
        let qa = qaElm[i], qadl = qa.getElementsByTagName('dl'), timeLine = new TimelineMax();
        for (let j = 0; j < qadl.length; j++) {
            let qadt = qadl[j].querySelectorAll('dt')[0], qadd = qadl[j].getElementsByTagName('dd')[0], arrowimg = qadl[j].getElementsByTagName('p')[0], closeBt = qadd.getElementsByClassName('arrow')[0];
            TweenMax.set(qadd, {
                display: 'none',
                height: 0,
                opacity: 0
            });
            qadt.addEventListener('click', function (ev) {
                let currentDd = ev.target.nextElementSibling;
                TweenMax.to(qadd, 0.6, {
                    display: 'block',
                    height: 'auto',
                    opacity: 1
                });
                TweenMax.to(arrowimg, 0.6, {
                    rotationZ: '180'
                });
                qadl[j].classList.add('open');
            });
            closeBt.addEventListener('click', function (ev) {
                timeLine.to(qadd, 0.3, {
                    opacity: 0
                }).to(qadd, 0.3, {
                    height: 0,
                    display: 'none'
                });
                TweenMax.to(arrowimg, 0.6, {
                    rotationZ: '0'
                });
                qadl[j].classList.remove('open');
            }, true);
        }
    }
}
;
if (qabox.length !== 0) {
    qaFunc(qabox);
}
// 物件詳細　スライド
// スライド対象の指定
var slidebox = document.getElementsByClassName('gallery-top')[0];
// 実行処理内容
function sliderfunc(slideelm) {
    if (Modernizr.flexbox) {
        let slideMain = document.getElementsByClassName('gallery-top')[0], slideElmClone = document.createDocumentFragment(), slideElm = slideMain.getElementsByClassName('swiper-slide'), slideThumbs = document.getElementsByClassName('gallery-thumbs')[0], slideThumbsWrap = slideThumbs.getElementsByClassName('swiper-wrapper')[0];
        for (let i = 0; i < slideElm.length; i++) {
            let clone = slideElm[i].cloneNode(true);
            slideElmClone.appendChild(clone);
        }
        slideThumbsWrap.appendChild(slideElmClone);
        var swiper = new Swiper(slidebox, {
            speed: 1000,
            spaceBetween: 0,
            slidesPerView: 'auto',
            centeredSlides: true,
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
        var galleryThumbs = new Swiper('.gallery-thumbs', {
            spaceBetween: 10,
            centeredSlides: true,
            slidesPerView: 'auto',
            touchRatio: 0.2,
            slideToClickedSlide: true,
            loop: true
        });
        swiper.controller.control = galleryThumbs;
        galleryThumbs.controller.control = swiper;
    }
    ;
}
;
if (slidebox !== undefined) {
    sliderfunc(slidebox);
}
;
// END:TOPのslider
// reserved form 
let roomtable1 = document.getElementById('table-people-1num'), roomtable2 = document.getElementById('table-people-2num'), roomtable3 = document.getElementById('table-people-3num'), roomSElm = document.getElementById('propertydetails-select-table');
function roomSelect(roomSFuncElm) {
    let peopleNum1 = document.getElementById('people-number1'), peopleNum2 = document.getElementById('people-number2'), peopleNum3 = document.getElementById('people-number3'), peopleNum1Number = peopleNum1.textContent, peopleNum2Number = peopleNum2.textContent, peopleNum3Number = peopleNum3.textContent;
    // rowspanを設定
    let trNumber = roomtable1.getElementsByTagName('tbody')[0].getElementsByTagName('tr').length;
    peopleNum1.setAttribute('rowspan', trNumber);
    // TweenMax 初期化
    TweenMax.set(roomtable1, {
        display: '',
        opacity: 1
    });
    TweenMax.set(roomtable2, {
        display: 'none',
        opacity: 0
    });
    TweenMax.set(roomtable3, {
        display: 'none',
        opacity: 0
    });
    let selectBox = document.createDocumentFragment(), selectWrap = roomSFuncElm.getElementsByClassName('propertydetails-select-table-people')[0], selectWrapUl = document.createElement('ul'), selectWrapLi1 = document.createElement('li'), selectWrapLi2 = document.createElement('li'), selectWrapLi3 = document.createElement('li');
    selectWrapLi1.textContent = peopleNum1Number;
    selectWrapLi2.textContent = peopleNum2Number;
    selectWrapLi3.textContent = peopleNum3Number;
    selectWrapLi1.setAttribute('id', 'NumberPeople1');
    selectWrapLi2.setAttribute('id', 'NumberPeople2');
    selectWrapLi3.setAttribute('id', 'NumberPeople3');
    selectWrapUl.appendChild(selectWrapLi1);
    selectWrapUl.appendChild(selectWrapLi2);
    selectWrapUl.appendChild(selectWrapLi3);
    selectBox.appendChild(selectWrapUl);
    selectWrap.appendChild(selectBox);
    peopleNum1.style.opacity = '1';
    peopleNum2.style.opacity = '1';
    peopleNum3.style.opacity = '1';
    // 生成後
    let ulWidth = selectWrapUl.clientWidth, ulHeight = selectWrapLi1.clientHeight + 16 + 2, clickBox = document.createElement('div'), closeBox = document.createElement('div'), clickcloseBox = document.createDocumentFragment();
    clickBox.setAttribute('id', 'ulclickbox');
    clickBox.style.height = ulHeight + 'px';
    closeBox.setAttribute('id', 'ulclosebox');
    clickcloseBox.appendChild(clickBox);
    clickcloseBox.appendChild(closeBox);
    selectWrap.appendChild(clickcloseBox);
    clickBox.addEventListener('click', function (ev) {
        TweenMax.to(clickBox, 0, {
            display: 'none'
        });
        TweenMax.to(selectWrapLi2, 0.3, {
            display: '',
            opacity: 1
        });
        TweenMax.to(selectWrapLi3, 0.3, {
            display: '',
            opacity: 1
        });
        TweenMax.to(closeBox, 0.3, {
            display: ''
        });
        TweenMax.to(closeBox, 0.3, {
            display: '',
            opacity: 1
        });
    });
    closeBox.addEventListener('click', function (ev) {
        TweenMax.to(clickBox, 0, {
            display: ''
        });
        TweenMax.to(selectWrapLi2, 0.3, {
            display: 'none',
            opacity: 0
        });
        TweenMax.to(selectWrapLi3, 0.3, {
            display: 'none',
            opacity: 0
        });
        TweenMax.to(closeBox, 0.3, {
            display: 'none',
            opacity: 0
        });
    });
    TweenMax.set(selectWrapLi2, {
        display: 'none',
        opacity: 0
    });
    TweenMax.set(selectWrapLi3, {
        display: 'none',
        opacity: 0
    });
    function change1() {
        TweenMax.to(roomtable1, 0.6, {
            display: '',
            opacity: 1
        });
        TweenMax.to(roomtable2, 0, {
            display: 'none',
            opacity: 0
        });
        TweenMax.to(roomtable3, 0, {
            display: 'none',
            opacity: 0
        });
    }
    ;
    function change2() {
        TweenMax.to(roomtable1, 0, {
            display: 'none',
            opacity: 0
        });
        TweenMax.to(roomtable2, 0.6, {
            display: '',
            opacity: 1
        });
        TweenMax.to(roomtable3, 0, {
            display: 'none',
            opacity: 0
        });
    }
    ;
    function change3() {
        TweenMax.to(roomtable1, 0, {
            display: 'none',
            opacity: 0
        });
        TweenMax.to(roomtable2, 0, {
            display: 'none',
            opacity: 0
        });
        TweenMax.to(roomtable3, 0.6, {
            display: '',
            opacity: 1
        });
    }
    ;
    selectWrapLi1.addEventListener('click', function () {
        change1();
    });
    selectWrapLi2.addEventListener('click', function () {
        change2();
    });
    selectWrapLi3.addEventListener('click', function () {
        change3();
    });
    if (mq.mobile) {
        let table1 = document.getElementById('table-people-1num'), table2 = document.getElementById('table-people-2num'), table3 = document.getElementById('table-people-3num');
        function mobileNumber(selectelm, peopleNumber) {
            let thead = selectelm.getElementsByTagName('thead')[0], trElm = document.createElement('tr'), tdElm = document.createElement('td'), peopleText;
            thead.insertBefore(trElm, thead.firstChild);
            trElm.appendChild(tdElm);
            tdElm.innerText = peopleNumber;
            tdElm.setAttribute('colspan', '5');
            tdElm.classList.add('mobile-peoplenumber-box');
        }
        ;
        mobileNumber(table1, peopleNum1Number);
        mobileNumber(table2, peopleNum2Number);
        mobileNumber(table3, peopleNum3Number);
    }
}
;
if (roomtable1 !== null || roomtable2 !== null || roomtable3 !== null) {
    roomSelect(roomSElm);
}
// formへの引き渡し
let toFormWrap = document.getElementsByClassName('propertydetails-wrap')[0];
function toForm() { }
;
if (toFormWrap !== undefined) {
    let residentName, //物件名
    numberPeople, // 人数
    roomType, // 部屋タイプ
    plan, // プラン
    squaresElm = [], toReservation = document.getElementsByClassName('to-reservation'), people1 = document.getElementById('table-people-1num'), people2 = document.getElementById('table-people-2num'), people3 = document.getElementById('table-people-3num');
    // classを人数毎のボタンに付与
    function peopleAddClass(peopleElm, classNames) {
        for (let i = 0; i < peopleElm.getElementsByClassName('to-reservation').length; i++) {
            peopleElm.getElementsByClassName('to-reservation')[i].getElementsByTagName('a')[0].classList.add(classNames);
        }
    }
    ;
    peopleAddClass(people1, 'addpeople1');
    peopleAddClass(people2, 'addpeople2');
    peopleAddClass(people3, 'addpeople3');
    // 行毎に判定する
    function typeFunc(peopleBoxElm, pNumber) {
        let people_tbody = peopleBoxElm.getElementsByTagName('tbody')[0], people_tr = people_tbody.getElementsByTagName('tr');
        for (let i = 0; i < people_tr.length; i++) {
            squaresElm.push('type_tr' + i);
            roomType = people_tr[i].getElementsByClassName('table-type-td')[0].innerText;
            // roomtype set
            let p_short = people_tr[i].getElementsByClassName('td-short')[0].getElementsByClassName('to-reservation')[0].getElementsByTagName('a')[0], p_middle = people_tr[i].getElementsByClassName('td-middle')[0].getElementsByClassName('to-reservation')[0].getElementsByTagName('a')[0], p_long = people_tr[i].getElementsByClassName('td-long')[0].getElementsByClassName('to-reservation')[0].getElementsByTagName('a')[0];
            p_short.setAttribute('data-roomtype', encodeURIComponent(roomType));
            p_middle.setAttribute('data-roomtype', encodeURIComponent(roomType));
            p_long.setAttribute('data-roomtype', encodeURIComponent(roomType));
            // people set
            numberPeople = pNumber;
            p_short.setAttribute('data-people', encodeURIComponent(numberPeople));
            p_middle.setAttribute('data-people', encodeURIComponent(numberPeople));
            p_long.setAttribute('data-people', encodeURIComponent(numberPeople));
            // plan set
            p_short.setAttribute('data-plan', 'short');
            p_middle.setAttribute('data-plan', 'middle');
            p_long.setAttribute('data-plan', 'long');
        }
    }
    // 人数をセットして実行
    typeFunc(people1, '1名');
    typeFunc(people2, '2名');
    typeFunc(people3, '3名');
    for (let i = 0; i < toReservation.length; i++) {
        toReservation[i].addEventListener('click', function (ev) {
            residentName = document.getElementsByClassName('propertydetails-category')[0].getElementsByTagName('h3')[0];
            let residentNameText = residentName.innerText, //物件名テキスト
            thisElm = ev.target, roomTypeText = toReservation[i].getElementsByTagName('a')[0].getAttribute('data-roomtype'), peopleNumberText = toReservation[i].getElementsByTagName('a')[0].getAttribute('data-people'), planText = toReservation[i].getElementsByTagName('a')[0].getAttribute('data-plan');
            Cookies.set('weeklycenter_residentName', encodeURIComponent(residentNameText));
            Cookies.set('weeklycenter_roomType', roomTypeText);
            Cookies.set('weeklycenter_plan', planText);
            Cookies.set('weeklycenter_people', peopleNumberText);
        });
    }
}
let reservationform = document.getElementsByClassName('reservationform')[0];
if (reservationform !== undefined) {
    let residentNameElm = document.getElementsByClassName('residentName-text')[0], residentNameText = document.createTextNode(decodeURIComponent(Cookies.get('weeklycenter_residentName'))), peoplenumberElm = document.getElementsByClassName('peoplenumber-text')[0], peoplenumberText = document.createTextNode(decodeURIComponent(Cookies.get('weeklycenter_people'))), roomTypeElm = document.getElementsByClassName('roomType-text')[0], roomTypeText = document.createTextNode(decodeURIComponent(Cookies.get('weeklycenter_roomType'))), planElm = document.getElementsByClassName('plan-text')[0], confpage = document.getElementsByClassName('formconf'), resetBox = document.getElementsByClassName('reservationreset');
    // 物件名
    if (Cookies.get('weeklycenter_residentName') !== undefined) {
        // residentNameElm.getElementsByTagName('input')[0].setAttribute('value', decodeURIComponent(Cookies.get('weeklycenter_residentName')));
        residentNameElm.getElementsByTagName('input')[0].value = decodeURIComponent(Cookies.get('weeklycenter_residentName'));
        residentNameElm.getElementsByTagName('input')[0].setAttribute('type', 'hidden');
        if (confpage.length === 0) {
            // 確認画面では出さない
            residentNameElm.getElementsByTagName('dl')[0].getElementsByTagName('dd')[0].appendChild(residentNameText);
        }
    }
    // 人数
    if (Cookies.get('weeklycenter_people') !== undefined) {
        peoplenumberElm.getElementsByTagName('input')[0].setAttribute('value', decodeURIComponent(Cookies.get('weeklycenter_people')));
        peoplenumberElm.getElementsByTagName('input')[0].setAttribute('type', 'hidden');
        if (confpage.length === 0) {
            // 確認画面では出さない
            peoplenumberElm.getElementsByTagName('dl')[0].getElementsByTagName('dd')[0].appendChild(peoplenumberText);
        }
    }
    // 部屋タイプ
    if (Cookies.get('weeklycenter_roomType') !== undefined) {
        roomTypeElm.getElementsByTagName('input')[0].setAttribute('value', decodeURIComponent(Cookies.get('weeklycenter_roomType')));
        roomTypeElm.getElementsByTagName('input')[0].setAttribute('type', 'hidden');
        if (confpage.length === 0) {
            // 確認画面では出さない
            roomTypeElm.getElementsByTagName('dl')[0].getElementsByTagName('dd')[0].appendChild(roomTypeText);
        }
    }
    // プラン
    if (Cookies.get('weeklycenter_plan') !== undefined) {
        if (Cookies.get('weeklycenter_plan') === 'short') {
            planElm.getElementsByTagName('input')[0].value = 'ショート(7～29泊)';
            if (confpage.length === 0) {
                // 確認画面では出さない
                planElm.getElementsByTagName('dl')[0].getElementsByTagName('dd')[0].appendChild(document.createTextNode('ショート(7～29泊)'));
            }
            // planElm.getElementsByTagName('input')[0].setAttribute('value', decodeURIComponent(Cookies.get('weeklycenter_plan')));
        }
        else if (Cookies.get('weeklycenter_plan') === 'middle') {
            planElm.getElementsByTagName('input')[0].value = 'ミドル(30～89泊)';
            if (confpage.length === 0) {
                // 確認画面では出さない
                planElm.getElementsByTagName('dl')[0].getElementsByTagName('dd')[0].appendChild(document.createTextNode('ミドル(30～89泊)'));
            }
        }
        else if (Cookies.get('weeklycenter_plan') === 'long') {
            planElm.getElementsByTagName('input')[0].value = 'ロング(90泊～)';
            if (confpage.length === 0) {
                // 確認画面では出さない
                planElm.getElementsByTagName('dl')[0].getElementsByTagName('dd')[0].appendChild(document.createTextNode('ロング(90泊～)'));
            }
        }
        planElm.getElementsByTagName('input')[0].setAttribute('type', 'hidden');
    }
    if (resetBox.length !== 0) {
        function formreset(resetBt) {
            let resetButton = resetBt[0].getElementsByTagName('p')[0];
            resetButton.addEventListener('click', function (ev) {
                Cookies.remove('weeklycenter_residentName');
                Cookies.remove('weeklycenter_people');
                Cookies.remove('weeklycenter_roomType');
                Cookies.remove('weeklycenter_plan');
                location.reload(true);
            });
        }
        ;
        formreset(resetBox);
    }
}
let form = document.getElementsByClassName('form');
function formFunk() {
    function init() {
        Postcode.init({ POST_UID: "400179691001" });
    }
}
;
if (form !== undefined) {
    formFunk();
}
// ここから下は読み込みが完了してから実行する。
window.onload = function () {
    svgTopng();
    // TOPのslider
    // スライド対象の指定
    var acptop = document.getElementById('acp-top');
    slidebox = document.getElementsByClassName('swiper-container')[0];
    // 実行処理内容
    function sliderfunc(slideelm) {
        if (Modernizr.flexbox) {
            var swiper = new Swiper(slidebox, {
                speed: 1000,
                spaceBetween: 0,
                slidesPerView: 'auto',
                centeredSlides: true,
                loop: true,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                autoplay: {
                    delay: 3000,
                }
            });
        }
        ;
    }
    ;
    if (acptop !== null) {
        sliderfunc(slidebox);
    }
    // END:TOPのslider
    // 範囲内スクロールのデザイン用
    const scrollWrapBox = document.getElementsByClassName('sclb-cs');
    function scrollbarfunc(scrollCustumWrap) {
        let scrollboxNum = scrollCustumWrap.length;
        for (let i = 0; i < scrollboxNum; i++) {
            Ps.initialize(scrollCustumWrap[i], {
                wheelPropagation: true,
                wheelSpeed: 0.5
            });
        }
        ;
    }
    ;
    scrollbarfunc(scrollWrapBox);
    // END:範囲内スクロールのデザイン用
    // サイド用のページ上部へスクロールするボタンのアクション・表示
    let sidePageTopBt = document.getElementById('page-side-banner'), pagetoppElm = document.getElementById('pageside-top');
    function sidepageTop(sidePageTopelm) {
        if (sidePageTopBt != null) {
            pagetoppElm.addEventListener('click', function () {
                TweenMax.to(window, 0.4, { scrollTo: 0 });
            });
            pagetoppElm.querySelector('a').addEventListener('click', function (event) {
                event.preventDefault();
            });
        }
        return sidePageTopelm;
    }
    ;
    sidepageTop(sidePageTopBt);
    // END:サイド用のページ上部へスクロールするボタンのアクション・表示
    // 汎用レイアウト内のページ上部へスクロールするボタンのアクション
    if (mainBlock != null) {
        let pagetopbox = mainBlock.getElementsByClassName('pagetop');
        if (pagetopbox.length !== 0) {
            function commonsidepageTop(pagetopelm) {
                if (0 < pagetopelm.length) {
                    var pagetopelm = pagetopelm, pagetopboxNum = pagetopelm.length, pagetopAtag = [];
                    for (var i = 0; i < pagetopboxNum; i++) {
                        pagetopelm[i].querySelector('a').addEventListener('click', function (event) {
                            event.preventDefault();
                            TweenMax.to(window, 0.4, { scrollTo: 0 });
                        });
                    }
                    return pagetopelm;
                }
            }
            ;
            commonsidepageTop(pagetopbox);
        }
    }
    // END:汎用レイアウト内のページ上部へスクロールするボタンのアクション
    // リンクをボックス全体に適用、WCでblank指定されている場合も設定を反映
    var linkboxtxt = document.getElementsByClassName('wlkb'); //指定クラス内のaタグのリンクを指定クラス親要素に対して付与
    // 例：li>p.wlkb>a[href="index.html"] はli要素全体がクリック可能となる。
    function linkwrap(linkBoxWrapelm) {
        if (linkBoxWrapelm.length != 0) {
            let linkhref = [], boxNum = linkBoxWrapelm.length;
            for (let i = 0; i < boxNum; i++) {
                linkhref = linkBoxWrapelm[i].getElementsByTagName('a')[0];
                if (linkhref != null) {
                    let linkLi = linkBoxWrapelm[i].parentNode, ahref = linkhref.getAttribute('href');
                    linkLi.addEventListener('mouseover', function (event) {
                        this.classList.add('onhover');
                        this.style.cursor = 'pointer';
                    });
                    linkLi.addEventListener('mouseout', function (event) {
                        this.classList.toggle('onhover');
                    });
                    linkLi.addEventListener('click', function (event) {
                        let linkclass = this.querySelector('a').getAttribute('class'), linkBlank = this.querySelector('a').getAttribute('target');
                        ahref = this.querySelector('a').getAttribute('href');
                        if (linkclass === 'wctr_blank' || linkBlank === '_blank') {
                            event.preventDefault();
                            window.open(ahref);
                        }
                        else {
                            event.preventDefault();
                            window.location.href = ahref;
                        }
                    });
                }
            }
        }
        ;
        return linkBoxWrapelm;
    }
    ;
    linkwrap(linkboxtxt);
    // TOPの物件リストのアニメーション
    let toplist = document.getElementsByClassName('estate-list');
    function toplistFunc(listElm) {
        for (let i = 0; i < listElm.length; i++) {
            let li = listElm[i].getElementsByTagName('li');
            for (let u = 0; u < li.length; u++) {
                li[u].addEventListener('mouseover', function (ev) {
                    let textbox = li[u].getElementsByClassName('estate-list-text')[0], twtl = new TimelineMax();
                    twtl.to(li[u], 0.2, {
                        borderTopColor: '#7F3A16',
                        borderWidth: '1px'
                    }, 0).to(li[u], 0.2, {
                        borderRightColor: '#7F3A16'
                    }, 0.1).to(li[u], 0.2, {
                        borderLeftColor: '#7F3A16'
                    }, 0.1).to(li[u], 0.2, {
                        borderBottomColor: '#7F3A16'
                    }, 0);
                });
                li[u].addEventListener('mouseout', function (ev) {
                    let textbox = li[u].getElementsByClassName('estate-list-text')[0], twtl = new TimelineMax();
                    twtl.to(li[u], 0.1, {
                        borderColor: 'transparent',
                        borderWidth: '0px'
                    }, 0);
                });
            }
        }
    }
    ;
    if (toplist.length !== 0) {
        toplistFunc(toplist);
    }
    // close:window.onload = function()
};
(function ($) {
    $(function () {
        // LightBox2　Script function 画像へのリンクが対象
        // $('a[href$=".jpg"], a[href$=".jpeg"], a[href$=".gif"], a[href$=".png"]').each(function(index, elm){
        // 	$(this).attr('data-lightbox', 'image');
        // 	var imageTitle = $('img', this).attr('alt');
        // 	$(this).attr('data-title', imageTitle).attr('title', imageTitle);
        // });
        // // LightBox Option
        // lightbox.option({
        // 	alwaysShowNavOnTouchDevices: true,
        // 	fadeDuration: 200,
        // 	imageFadeDuration: 200
        // });
        if (reservationform !== undefined) {
            $(function () {
                $('#jquery-ui-datepicker-to').css({
                    background: '#eeeeee'
                });
                $('#jquery-ui-datepicker-from').datepicker({
                    language: "ja",
                    format: "yyyy年mm月dd日",
                    todayHighlight: false,
                    startDate: "+1d",
                    autoclose: true
                })
                    .on('changeDate', function (e) {
                    $('#jquery-ui-datepicker-to').datepicker({
                        language: "ja",
                        format: "yyyy年mm月dd日",
                        todayHighlight: false,
                        autoclose: true
                    });
                    $('#jquery-ui-datepicker-to').datepicker('show'); //終了日のカレンダーを表示
                    selected_date = e['date']; //開始日のデータ取得
                    yyyy = selected_date.getFullYear();
                    mm = selected_date.getMonth() + 1;
                    dd = selected_date.getDate();
                    sd = computeDate(yyyy, mm, dd, 90); //0000-00-00の形で指定日後が返ってくる
                    $('#jquery-ui-datepicker-to').datepicker('setStartDate', sd); //start日より前の日を無効化する
                    $('#jquery-ui-datepicker-to').css({
                        background: '#fff'
                    });
                });
            });
            function computeDate(year, month, day, addDays) {
                var dt = new Date(year, month - 1, day);
                var baseSec = dt.getTime();
                var addSec = addDays * 86400000; //日数 * 1日のミリ秒数
                var targetSec = baseSec + addSec;
                dt.setTime(targetSec);
                return dt;
            }
        }
        // jQuery
        /*  ============================  */
    });
})(jQuery);
//# sourceMappingURL=script.js.map