function init() {
    let app = new App();
    app.drawChart();
}

class App {
    constructor(){
        this.maxValue = 0;
        this.chartHeight = 200;
        this.barWidth = 50;

        this.calcMaxValue();
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

    drawChart(){
        let elements = this.getElements();
        elements.forEach((el, i) => {
            let newValue = parseInt(el.getAttribute('value'));
            const timestamp = el.getAttribute('timestamp');

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
