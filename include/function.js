function login(){
    //#modaLogin -> id do modal
    $('#modaLogin').modal('show');
}

//Para fazer a tela de registro do usuário, somente copiar o código acima, mudando o nome da 
//função e o id(representado por #) do modal.

// CONSTRUÇÃO DO ESTACIONAMENTO
const tokens = {
    open: 0,
    car: 1
};
const carType = 'car';

let parkingLot = [
    [tokens.open, tokens.open, tokens.open, tokens.open, tokens.open],
    [tokens.open, tokens.open, tokens.open, tokens.open, tokens.open],
    [tokens.open, tokens.open, tokens.open, tokens.open, tokens.open],
    [tokens.open, tokens.open, tokens.open, tokens.open, tokens.open]
];

const el = document.querySelector('.main');
const buttons = document.querySelectorAll('.button');
const primaryButton = document.querySelector('.primary');
const randomButton = document.querySelector('.secondary');

function render() {
  el.innerHTML = '';
  const rows = parkingLot.length;
  let rowIndex = 0;
  for (;rowIndex < rows;rowIndex++) {
      const row = parkingLot[rowIndex];
      const spots = row.length;
      let spotIndex = 0;
      let rowEl = document.createElement('div');
    el.appendChild(rowEl);
      for(;spotIndex < spots; spotIndex++) {
        const spot = row[spotIndex];
        let spotEl = document.createElement('div');
        if (spot === tokens.car) {
          let car = document.createElement('div');
          car.appendChild(document.createTextNode('car'));
          car.className = carType;
          car.setAttribute('pos', `${rowIndex}|${spotIndex}`);
          spotEl.appendChild(car);
        }
        rowEl.appendChild(spotEl);
      }
  }
}

function parkCar() {
  const rows = parkingLot.length;
  let rowIndex = 0;
  const findSpot = () => {
    for (;rowIndex < rows;rowIndex++) {
        const row = parkingLot[rowIndex];
        const spots = row.length;
        let spotIndex = 0;
        for(;spotIndex < spots; spotIndex++) {
          let spot = row[spotIndex];
          if (spot === tokens.open) {
            return {rowIndex,spotIndex};
          }
        }
    }
    return false;
  }
  const spotFound = findSpot();
  if (spotFound !== false) {
    parkInSpot(spotFound);
    if (findSpot() === false) {
      parkingIsFull();  
    }
  }
}

function parkCarRandomly() {
  const rows = parkingLot.length;
  let rowIndex = 0;
  let availableSpots = [];
  for (;rowIndex < rows;rowIndex++) {
        const row = parkingLot[rowIndex];
        const spots = row.length;
        let spotIndex = 0;
        for(;spotIndex < spots; spotIndex++) {
          let spot = row[spotIndex];
          if (spot === tokens.open) {
            availableSpots.push({rowIndex,spotIndex});
          }
        }
    }
  if(availableSpots.length) {
    const index = Math.floor((availableSpots.length - 1) * Math.random());
    parkInSpot(availableSpots[index]);
    if (availableSpots.length ===1) {
      parkingIsFull();  
    }
  }
}

function parkInSpot(spot) {
  const {rowIndex, spotIndex} = spot;
  parkingLot[rowIndex][spotIndex] = tokens.car;
  render();
}

function parkingIsFull() {
  buttons.forEach((button) => {
    button.innerHTML='Full!';
    button.setAttribute('disabled', 'disabled');  
  });
}

function parkingIsNotFull() {
  buttons.forEach((button) => {
    button.removeAttribute('disabled');
    button.innerHTML=button.getAttribute('data-text');
  });
}

const leaveParking = (evt) => {
  let target = evt.target;
  if (target.className === carType) {
    const [rowIndex, spotIndex] = target.getAttribute('pos').split('|');
    parkingLot[rowIndex][spotIndex] = tokens.open;
    parkingIsNotFull();
    render();
  }
};

//setup events
document.addEventListener('click', leaveParking);
primaryButton.addEventListener('click', parkCar);
randomButton.addEventListener('click', parkCarRandomly);

//initial render
render();
//FIM DA CONSTRUÇÃO DO ESTACIONAMENTO



