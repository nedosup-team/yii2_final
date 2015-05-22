function getBreakpoint(prefix) {
    var regex = new RegExp(prefix + '(\\d+)'); 
    var css_breakpoint = $head.css('font-family');

    return parseInt(regex.exec(css_breakpoint)[1]);
}