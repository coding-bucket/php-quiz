import addSlideToggle from './js/addSlideToggle.js';
import addCopyCodeLabel from './js/addCopyCodeLabel.js';
import addBurgerToggle from './js/addBurgerToggle.js';
import addDarkModeToggle from './js/addDarkModeToggle.js';

import hljs from 'highlight.js/lib/core';
import php from 'highlight.js/lib/languages/php';
import plaintext from 'highlight.js/lib/languages/plaintext';

hljs.registerLanguage('php', php);
hljs.registerLanguage('plaintext', plaintext);
window.hljs = hljs;
require('highlightjs-line-numbers.js');

addDarkModeToggle();
addSlideToggle();
addCopyCodeLabel();
addBurgerToggle();

hljs.highlightAll();
hljs.initLineNumbersOnLoad();
