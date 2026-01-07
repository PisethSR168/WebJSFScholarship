// Mobile Menu Functionality
$(document).ready(function() {
    // ... existing theme toggle code ...
    
    // Mobile menu open
    $('#mobileOpen').on('click', function() {
        $('#mobileMenu').removeClass('hidden');
        setTimeout(() => {
            $('#mobileMenu').find('.translate-x-full').removeClass('translate-x-full');
        }, 10);
    });
    
    // Mobile menu close
    $('#mobileClose, #mobileBackdrop').on('click', function() {
        $('#mobileMenu').find('.absolute.right-0').addClass('translate-x-full');
        setTimeout(() => {
            $('#mobileMenu').addClass('hidden');
            $('#mobileOpen i').removeClass('fa-times').addClass('fa-bars');
        }, 300);
    });
    
    // Mobile dropdown toggles
    $('.mobile-dropdown-toggle').on('click', function() {
        const $this = $(this);
        const $submenu = $this.next('.mobile-submenu');
        const $icon = $this.find('i');
        
        // Close other dropdowns
        $('.mobile-submenu').not($submenu).slideUp(200);
        $('.mobile-dropdown-toggle').not($this).find('i').removeClass('fa-chevron-up').addClass('fa-chevron-down');
        
        // Toggle current dropdown
        $submenu.slideToggle(200);
        
        // Toggle icon
        if ($icon.hasClass('fa-chevron-down')) {
            $icon.removeClass('fa-chevron-down').addClass('fa-chevron-up');
        } else {
            $icon.removeClass('fa-chevron-up').addClass('fa-chevron-down');
        }
    });
    
    // Mobile theme toggle
    $('.mobile-theme-toggle').on('click', function() {
        // Trigger the desktop theme toggle
        $('#darkToggle').click();
        
        // Update mobile toggle visual state
        const isDark = $('html').hasClass('dark');
        const $toggle = $(this).find('.relative');
        const $circle = $toggle.find('div');
        const $icon = $(this).find('i');
        
        if (isDark) {
            $circle.css('transform', 'translateX(1.5rem)');
            $icon.removeClass('fa-moon').addClass('fa-sun');
        } else {
            $circle.css('transform', 'translateX(0)');
            $icon.removeClass('fa-sun').addClass('fa-moon');
        }
    });
    
    // ... rest of existing code ...
});

