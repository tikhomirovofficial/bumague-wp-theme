document.addEventListener('DOMContentLoaded', function() {
  const form = document.getElementById('calculatorForm');
  const steps = document.querySelectorAll('.calculator__steps-item');
  const tabs = document.querySelectorAll('.calculator__tab');
  const nextBtn = document.querySelector('.calculator__next');
  const submitBtn = document.querySelector('.calculator__submit');
  
  let currentStep = 1;
  const totalSteps = steps.length;
  
  // Инициализация
  updateUI();
  
  // Клик по шагам вверху - с ограничениями
  steps.forEach(step => {
    step.addEventListener('click', function() {
      const stepNum = parseInt(this.dataset.step);
      
      // Разрешаем переход только:
      // 1. На уже пройденные шаги (stepNum < currentStep)
      // 2. На следующий шаг (stepNum === currentStep + 1), если текущий валиден
      if (stepNum < currentStep || 
          (stepNum === currentStep + 1 && validateStep(currentStep))) {
        currentStep = stepNum;
        updateUI();
        nextBtn.style.display = currentStep === totalSteps ? 'none' : 'flex';
      }
    });
  });
  
  // Кнопка "Далее" с валидацией
  nextBtn.addEventListener('click', function() {
    if (validateStep(currentStep)) {
      goToNextStep();
    } else {
      alert('Пожалуйста, выберите один из вариантов');
    }
  });
  
  // Переход на следующий шаг
  function goToNextStep() {
    currentStep++;
    updateUI();
    nextBtn.style.display = currentStep === totalSteps ? 'none' : 'flex';
  }
  
  // Валидация шага
  function validateStep(step) {
    const currentTab = document.querySelector(`.calculator__tab[data-calc-tab="${step}"]`);
    const radioInputs = currentTab.querySelectorAll('input[type="radio"]');
    
    if (radioInputs.length > 0) {
      return currentTab.querySelector('input[type="radio"]:checked') !== null;
    }
    return true;
  }
  
  // Обновление интерфейса
  function updateUI() {
    // Обновляем шаги
    steps.forEach(step => {
      const stepNum = parseInt(step.dataset.step);
      const isActive = stepNum === currentStep;
      const isCompleted = stepNum < currentStep;
      const isAvailable = stepNum <= currentStep + 1 && 
                         (stepNum <= currentStep || validateStep(currentStep));
      
      step.classList.toggle('calculator__steps-item--active', isActive);
      step.classList.toggle('calculator__steps-item--completed', isCompleted);
      step.classList.toggle('calculator__steps-item--available', isAvailable);
      step.style.cursor = isAvailable ? 'pointer' : 'default';
    });
    
    // Обновляем табы
    tabs.forEach(tab => {
      const tabNum = parseInt(tab.dataset.calcTab);
      tab.classList.toggle('calculator__tab--active', tabNum === currentStep);
    });
    
    // Плавная прокрутка
    document.querySelector(`.calculator__tab--active`).scrollIntoView({
      behavior: 'smooth',
      block: 'nearest'
    });
  }
  
  // Отправка формы
  form.addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(form);
    console.log('Данные формы:', Object.fromEntries(formData));
    alert('Спасибо! Ваша заявка принята. Мы свяжемся с вами в ближайшее время.');
    form.reset();
  });
});