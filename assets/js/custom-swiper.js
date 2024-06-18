document.addEventListener('DOMContentLoaded', function() {
    const eventsContainer = document.querySelector('.elvanto-calendar-events');
    const eventsList = document.querySelector('.elvanto-calendar-events-ul');
    if (eventsContainer && eventsList) {
        const swiperWrapper = document.createElement('div');
        swiperWrapper.classList.add('swiper-wrapper');
        
        while (eventsList.firstChild) {
            const eventItem = eventsList.firstChild;
            const swiperSlide = document.createElement('div');
            swiperSlide.classList.add('swiper-slide');
            
            const img = eventItem.querySelector('.elvanto-calendar-events-pic');
            const title = eventItem.querySelector('.elvanto-calendar-events-title');
            const date = eventItem.querySelector('.elvanto-calendar-events-date');
            
            const titleWrapper = document.createElement('div');
            titleWrapper.classList.add('elvanto-calendar-events-title');
            const titleElement = document.createElement('h3');
            titleElement.innerHTML = title.innerHTML;
            titleWrapper.appendChild(titleElement);

            const dateWrapper = document.createElement('div');
            dateWrapper.classList.add('elvanto-calendar-events-date');
            const dateElement = document.createElement('h4');
            dateElement.innerHTML = date.innerHTML;
            dateWrapper.appendChild(dateElement);
            
            swiperSlide.appendChild(img);
            swiperSlide.appendChild(titleWrapper);
            swiperSlide.appendChild(dateWrapper);
            
            swiperWrapper.appendChild(swiperSlide);
            eventsList.removeChild(eventItem);
        }
        
        eventsList.remove();
        eventsContainer.appendChild(swiperWrapper);
        
        const swiper = new Swiper('.elvanto-calendar-events', {
            slidesPerView: 'auto',
            spaceBetween: 20,
            freeMode: true,
            scrollbar: {
                el: '.swiper-scrollbar',
                hide: false,
            },
            mousewheel: true,
        });
    }
});
