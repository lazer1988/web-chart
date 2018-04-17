function addEvent(object, type, callback) {
    if (object == null || typeof(object) == 'undefined') return;
    if (object.addEventListener) {
        object.addEventListener(type, callback, false);
    } else if (object.attachEvent) {
        object.attachEvent("on" + type, callback);
    } else {
        object["on"+type] = callback;
    }
}

function init() {
    let app = new App();
    app.drawChart();

    addEvent(window, 'resize', () => app.drawChart());
}

/**
 * of course for cross-browser compatibility need use webpack with babel,
 * but for test task it's good without
 */
class App {
    constructor(){
        this.maxValue = 0;
        this.chartHeight = 0;
        this.barWidth = 0;
        this.spaceBetweenColumns = 10;
    }

    getElements(){
        return document.querySelectorAll('#chart .value');
    }

    calcMaxValue(){
        let elements = this.getElements();
        elements.forEach(el => {
            let newValue = parseInt(el.getAttribute('value'));
            if (newValue > this.maxValue) {
                this.maxValue = newValue;
            }
        });
    }

    calcChartDimensions(){
        let chart = document.getElementById('chart');
        this.chartHeight = chart.clientHeight;

        let elements = this.getElements().length;

        this.barWidth = (chart.clientWidth - elements*this.spaceBetweenColumns) / elements;
    }

    getElementTitle(timestamp){
        timestamp = parseInt(timestamp);
        if (!timestamp) {
            return;
        }

        let date = new Date();
        let week = 604800;
        let weeks = Math.floor((date.getTime() - (timestamp*1000)) / 1000 / week);

        return weeks + ' weeks ago';
    }

    drawChart(){
        this.calcMaxValue();
        this.calcChartDimensions();

        let elements = this.getElements();
        elements.forEach((el, i) => {
            let newValue = parseInt(el.getAttribute('value'));
            const timestamp = el.getAttribute('timestamp');
            if (timestamp) {
                el.title = this.getElementTitle(timestamp);
            }

            el.style.height = ((newValue / this.maxValue) * this.chartHeight) + 'px';
            el.style.width = this.barWidth + 'px';
            el.style.left = (i * (this.barWidth + 10) + 5) + 'px';
            el.innerHTML = newValue;

            el.onclick = (litres => {
                return () => {
                    alert('This much coffee!!! ' + litres + ' litres');
                }
            })(newValue);
        });
    }
}
