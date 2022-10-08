function sum() {
    var s, x, y;
    s =
        Number(document.getElementById('b').value) *
        Number(document.getElementById('b').value) -
        4(
            Number(document.getElementById('a').value) *
            Number(document.getElementById('c').value)
        );
    if (s > 0) {
        x =
            ((-Number(document.getElementById('b').value) + s) / 2) *
            Number(document.getElementById('a').value);
        y =
            ((-Number(document.getElementById('b').value) - s) / 2) *
            Number(document.getElementById('a').value);
    } else {
        alert('function undefine');
    }
    document.getElementById('result').innerHTML = 'Result: ' + s;
}