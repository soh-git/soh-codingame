let comp = [];
let beatenby = {
    "C": ["P", "L"],
    "P": ["R", "S"],
    "R": ["L", "C"],
    "L": ["S", "P"],
    "S": ["C", "R"]
}
const N = parseInt(readline());
for (let i = 0; i < N; i++) {
    var inputs = readline().split(' ');
    const NUMPLAYER = parseInt(inputs[0]);
    const SIGNPLAYER = inputs[1];
    comp.push({
        'id': i,
        'numPlayer': NUMPLAYER,
        'sign': SIGNPLAYER,
        'beat': [],
        'loser': false
    });

}


while (comp.length > 1) {
    loser = [];
    for (let i = 0; i < comp.length;) {
        let leader = comp[i];
        let challenger = comp[i + 1];
        let duelLooser;
        if (leader.sign === challenger.sign) {
            duelLooser = (leader.numPlayer > challenger.numPlayer) ? leader : challenger;
        } else {

            duelLooser = (!beatenby[leader.sign].includes(challenger.sign)) ? leader : challenger;

        }
        (duelLooser === leader) ? challenger.beat.push(leader.numPlayer) : leader.beat.push(challenger.numPlayer);
        loser.unshift(duelLooser.id);
        i = i + 2;
    }

    for (let i = 0; i < loser.length; i++) {
        comp = comp.filter(player => player.id != loser[i]);

    }
}

console.log(comp[0].numPlayer);
console.log(comp[0].beat.join(" "));