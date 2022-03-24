function goodArray(array) {
    let s = new Set();
    for (let i = 0; i < array.length; i++) {
        s.add(array[i]);
    }

    return (s.size == array.length);
}
let sudoku = [];
$correct = true;
for (let i = 0; i < 9; i++) {
    var inputs = readline().split(' ');
    sudoku[i] = [];
    for (let j = 0; j < 9; j++) {
        const n = parseInt(inputs[j]);
        sudoku[i].push(n);
    };

}


for (let i = 0; i < 9;) {
    for (let k = 0; k < 9;) {
        let grid = [];

        for (let j = k; j < k + 3; j++) {

            grid.push(sudoku[i    ][j]);
            grid.push(sudoku[i + 1][j]);
            grid.push(sudoku[i + 2][j]);
            ;
        }


        k = k + 3;
        if (!goodArray(grid)) {
            $correct = "false";
            break

        }
    } i = i + 3;
}
for (let i = 0; i < 9; i++) {
    let row = sudoku[i]

    if (!goodArray(row)) {
        $correct = "false";
        break

    }
    let column = [];
    for (let j = 0; j < 9; j++) {
        column.push(sudoku[j][i]);
    }
    if (!goodArray(column)) {
        $correct = "false";
        break
    }


}

console.log($correct);
