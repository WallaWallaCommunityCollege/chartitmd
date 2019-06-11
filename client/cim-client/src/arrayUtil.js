'use strict';
Array.prototype.scaleBetween = function (scaledMin, scaledMax) {
    const max = Math.max.apply(Math, this);
    const min = Math.min.apply(Math, this);
    if (0 === max - min) {
        return this.map(() => (
                                  scaledMin + scaledMax
                              ) / 2);
    }
    let scaleDiff = scaledMax - scaledMin;
    let bottom = (max - min) + scaledMin;
    return this.map(num => scaleDiff * (num - min) / bottom);
};
