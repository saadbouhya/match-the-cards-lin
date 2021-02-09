

results = Array(); // Les resultats des joueurs (temps, nombre de flips )
gameOver = false;


class MatchTheCards {
    constructor(totalTime, cards) {
        this.cardsArray = cards;
        this.totalTime = totalTime;
        this.timeRemaining = totalTime;
        this.timer = document.getElementById('time-remaining')
        this.ticker = document.getElementById('flips');
        
    }

    getTotalClicks(){
        return this.ticker.innerText;
    }

    startGame() { // Commencer le jeu
        this.totalClicks = 0; 
        this.timeRemaining = this.totalTime; 
        this.cardToCheck = null;
        this.matchedCards = [];
        this.busy = true;
        setTimeout(() => {
            this.shuffleCards(this.cardsArray);
            this.countdown = this.startCountdown();
            this.busy = false;
        }, 500)
        this.hideCards();
        this.timer.innerText = this.timeRemaining;
        this.ticker.innerText = this.totalClicks;
    }
    startCountdown() { // Commencer le compte a rebours
        return setInterval(() => {
            this.timeRemaining--;
            this.timer.innerText = this.timeRemaining;
            if(this.timeRemaining === 0)
                this.gameOver();
        }, 1000);
    }
    gameOver() { // Si l'un des joueurs n'a plus de temps
        clearInterval(this.countdown);
        document.getElementById('game-over-text').classList.add('visible');
        results.push([document.getElementById('flips').innerText, document.getElementById('time-remaining').innerText]);
        gameOver = true;
    }
    victory() { // Si le joueurs a trouve toutes les cartes avant la fin du temps
        clearInterval(this.countdown);
        document.getElementById('victory-text').classList.add('visible');
        results.push([document.getElementById('flips').innerText, document.getElementById('time-remaining').innerText]);

    }
    hideCards() { // Cacher toutes les cartes pour commencer le jeu
        this.cardsArray.forEach(card => {
            card.classList.remove('visible');
            card.classList.remove('matched');
        });
    }
    flipCard(card) { // Faire tourner la carte
        if(this.canFlipCard(card)) {
            this.totalClicks++;
            this.ticker.innerText = this.totalClicks;
            card.classList.add('visible');

            if(this.cardToCheck) {
                this.checkForCardMatch(card);
            } else {
                this.cardToCheck = card;
            }
        }
    }
    checkForCardMatch(card) { // Verifier si les deux cartes qu'on a choisi sont pareils
        if(this.getCardType(card) === this.getCardType(this.cardToCheck))  // On compare les sources des cartes
            this.cardMatch(card, this.cardToCheck);
        else 
            this.cardMismatch(card, this.cardToCheck);

        this.cardToCheck = null;
    }
    cardMatch(card1, card2) { // Si les deux cartes qu'on a choisi sont pareils 
        this.matchedCards.push(card1);
        this.matchedCards.push(card2);
        card1.classList.add('matched');
        card2.classList.add('matched');
        if(this.matchedCards.length === this.cardsArray.length)
            this.victory();
    }
    cardMismatch(card1, card2) { // Si les deux cartes qu'on a choisi ne sont pas pareils on les fait retourner
        this.busy = true;
        setTimeout(() => {
            card1.classList.remove('visible');
            card2.classList.remove('visible');
            this.busy = false;
        }, 1000);
    }
    shuffleCards(cardsArray) { // Melanger les cartes (algorithme de fisher-yates) 
        for (let i = cardsArray.length - 1; i > 0; i--) {
            let randIndex = Math.floor(Math.random() * (i + 1));
            cardsArray[randIndex].style.order = i;
            cardsArray[i].style.order = randIndex;
        }
    }
    getCardType(card) {
        return card.getElementsByClassName('card-value')[0].src;
    }
    canFlipCard(card) { // Savoir si on peut tourner la carte
        return !this.busy && !this.matchedCards.includes(card) && card !== this.cardToCheck;
    }
}

if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready2(function(){winner(results)}));
} else {
    ready2(function(){winner(results)});
} // Attendre le chargement du code html avant d'executer le code javascript




function round(player){ // On commence le jeu
    let playerBackground = document.getElementById(player);
    let cards = Array.from(document.getElementsByClassName('card'));
    let game = new MatchTheCards(150, cards);
    playerBackground.classList.add("visible");
    playerBackground.addEventListener("click", function (){
        playerBackground.addEventListener('click', playerBackground.classList.remove('visible'));
        game.startGame();
        cards.forEach(card => {
        card.addEventListener('click', () => {
            game.flipCard(card);
        });
        });
    });
}



function ready2(){
    var end = false;
    round('p1');
    document.getElementById('victory-text').addEventListener("click", function (){
        document.getElementById('victory-text').classList.remove('visible');
        if (end == false){
            round('p2');
            p2Round = true;
            end = true;
            document.getElementById('victory-text').addEventListener('click', function(){winner(results)});
            document.getElementById('game-over-text').addEventListener('click', function(){winner(results)});
        }

    });
    document.getElementById('game-over-text').addEventListener("click", function (){
        document.getElementById('game-over-text').classList.remove('visible');
        if (end == false){
            round('p2');
            p2Round = true;
            end = true;
            document.getElementById('victory-text').addEventListener('click', function(){winner(results)});
            document.getElementById('game-over-text').addEventListener('click', function(){winner(results)});
        }
    });
}

function winnerRound(results) {
    if(results[0][1] == 0 && results[1][1] != 0){ // Pad de temps restant player 1
        return "Player 2";
    }else if (results[0][1] != 0 && results[1][1] == 0){ // Pas de temps restant player 2 
        return "Player 1"
    }else if (results[0][1] == 0 && results[1][1] == 0){ // Pas de temps restant pour les deux
        return "Tie"
    }else if (results[0][1] < results[1][1]) { // temps re Player 1 < temps re Player 2
        return "Player 2"
    }else if (results[0][1] > results[1][1]) { // temps re Player 1 > temps re Player 1
        return "Player 1"
    }else if (results[0][1] == results[1][1]) { // si ils ont le meme temps restant
        if (results[0][0] > results[1][0]) { // nombre de flips Player 1 > nombre de flips Player 2
            return "Player 2"
        } else if (results[0][0] < results[1][0]) { // nombre de flips Player 1 < nombre de flips Player 2
            return "Player 1"
        } else if (results[0][0] == results[1][0]) { // mme nombre de flips
            return "Tie";
        }
    }
}

function winner(results){ // Annoncer le winner
    document.getElementById("winner").classList.add("visible");
    document.getElementById("playerW").innerText = winnerRound(results);
    document.getElementById("winner").addEventListener("click", function (){
        window.location.replace("login.php") ;
    })
}











