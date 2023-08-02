// const listMenu = ['ทรงผม', 'สไตล์ผม', 'สีผม', 'การดูแลผม', 'ผลิตภัณฑ์ดูแลผม', 'ร้าน']
const colors = ['#ADACDF', '#DFACC8', '#ACDFCA', '#DFD4AC', '#DFACAC', '#C6ACDF']

/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction(key) {
  switch (key) {
    case 1:
      document.getElementById('myDropdownOne').classList.toggle('show')
      break
    case 2:
      document.getElementById('myDropdownTwo').classList.toggle('show')
      break
    case 3:
      document.getElementById('myDropdownThree').classList.toggle('show')
      break
    case 4:
      document.getElementById('myDropdownFour').classList.toggle('show')
      break
    case 5:
      document.getElementById('myDropdownFive').classList.toggle('show')
      break
    default:
      document.getElementById('myDropdownSix').classList.toggle('show')
      break
  }
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function (event) {
  if (!event.target.matches('.dropbtnOne')) {
    let dropdownOne = document.getElementsByClassName('dropdown-content-one')
    let openDropdownOne = dropdownOne[0]
    if (openDropdownOne.classList.contains('show')) openDropdownOne.classList.remove('show')
  }
  if (!event.target.matches('.dropbtnTwo')) {
    let dropdownTwo = document.getElementsByClassName('dropdown-content-two')
    let openDropdownTwo = dropdownTwo[0]
    if (openDropdownTwo.classList.contains('show')) openDropdownTwo.classList.remove('show')
  }
  if (!event.target.matches('.dropbtnThree')) {
    let dropdownThree = document.getElementsByClassName('dropdown-content-three')
    let openDropdownThree = dropdownThree[0]
    if (openDropdownThree.classList.contains('show')) openDropdownThree.classList.remove('show')
  }
  if (!event.target.matches('.dropbtnFour')) {
    let dropdownFour = document.getElementsByClassName('dropdown-content-four')
    let openDropdownFour = dropdownFour[0]
    if (openDropdownFour.classList.contains('show')) openDropdownFour.classList.remove('show')
  }
  if (!event.target.matches('.dropbtnFive')) {
    let dropdownFive = document.getElementsByClassName('dropdown-content-five')
    let openDropdownFive = dropdownFive[0]
    if (openDropdownFive.classList.contains('show')) openDropdownFive.classList.remove('show')
  }
  if (!event.target.matches('.dropbtnSix')) {
    let dropdownSix = document.getElementsByClassName('dropdown-content-six')
    let openDropdownSix = dropdownSix[0]
    if (openDropdownSix.classList.contains('show')) openDropdownSix.classList.remove('show')
  }
}
