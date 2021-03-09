const route = document.querySelector('.route');
const time2 = document.querySelector('.time2');
const time = document.querySelector('.time');
const title = document.querySelector('.h3');
const num = document.querySelector('#num');
const travelTime = 50;
console.log('hello')

const arrTimeBA = ['18:30','18:45','19:00','19:15','19:35','21:50','21:55'];
const arrTimeAB = ['18:00','18:30','18:45','19:00','19:15','21:00'];

const calculationTime = function() {
  time2.innerHTML = '';

  arrTimeBA.forEach( element => {
    secondElement = (+element.substr(0,2) * 60 * 60) + (+element.substr(3,2) * 60);
    secondTime = (+this.value.substr(0,2) * 60 * 60) + (+this.value.substr(3,2) * 60) + (travelTime * 60);

    if(secondElement > secondTime) {
     const option = document.createElement('option');
     option.value = element;
     option.textContent = element +'(из B в A)';
     time2.append(option);
    }
  });
}

function createOption (arr, text, container) {
  arr.forEach( element => {
    const option = document.createElement('option');
    option.value = element;
    option.textContent = element + text;
    container.append(option);
  });
}

route.addEventListener('change', function() {
   if(this.childNodes[1].value === this.value) {
    time.innerHTML = '';
    time.name = 'timeAB';
    createOption(arrTimeAB, '(из A в B)', time);
   };

   if(this.childNodes[3].value === this.value) {
    time.innerHTML = '';
    time.name = 'timeBA';
    createOption(arrTimeBA, '(из B в A)', time);

   
   };
  if(this.childNodes[5].value === this.value) {
    time.innerHTML = '';
    time.name = 'timeAB';
    createOption(arrTimeAB, '(из A в B)', time)
    time.addEventListener('change', calculationTime)
    time2.innerHTML = '';
    title.classList.add('time2-active'); 
    time2.classList.add('time2-active');
    calculationTime.call(time);
    return
  }
  title.classList.remove('time2-active');
  time2.classList.remove('time2-active');
});
