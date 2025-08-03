import './bootstrap';
import 'flowbite'; 
import { createIcons, icons } from 'lucide';

window.lucide = { createIcons, icons };

document.addEventListener('DOMContentLoaded', () => {
    lucide.createIcons({ icons }); // এখানে icons পাস করা হচ্ছে
});