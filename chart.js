function init() {
    var max_value = 0;
    var values_count = 0;
    var chart_height = 200;
    var bar_width = 50;

    var elements = document.querySelectorAll('#chart .value');
    Array.prototype.forEach.call(elements, function(el, i) {
        new_value = parseInt(el.value);
        if (new_value >= max_value) {
            max_value += new_value;
        }
        values_count++;
    });

    var i = 0;

    var elements = document.querySelectorAll('#chart .value');
    Array.prototype.forEach.call(elements, function(el, i) {
        new_value = parseInt(el.getAttribute('value'));
        const timestamp = el.getAttribute('timestamp');
        el.style.height = ((new_value / max_value) * chart_height) + 'px';
        el.style.width = bar_width + 'px';
        el.style.left = i * (bar_width + 10) + 5 + 'px';
        el.innerHTML = new_value;
        el.onclick = function() {
            alert('This much coffee!!! ' + new_value + ' litres');
        }
        i++;
    });
}