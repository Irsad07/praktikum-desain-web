// Animate the logo text by wrapping each character in a span and staggering animation delays
document.addEventListener('DOMContentLoaded', function () {
    const logoText = document.querySelector('.logo-text');
    if (!logoText) return;

    // Get raw text (keeping inner span for the last part if present)
    // We'll handle plain text and nested <span> inside .logo-text
    const parts = [];
    logoText.childNodes.forEach(node => {
        if (node.nodeType === Node.TEXT_NODE) {
            parts.push({type: 'text', value: node.nodeValue});
        } else if (node.nodeType === Node.ELEMENT_NODE) {
            // Keep element nodes (like <span>) as separate parts
            parts.push({type: 'node', value: node.cloneNode(true)});
        }
    });

    // Clear existing content
    logoText.innerHTML = '';

    let charIndex = 0;
    parts.forEach(part => {
        if (part.type === 'text') {
            const text = part.value.trim();
            for (let i = 0; i < text.length; i++) {
                const ch = text[i];
                const span = document.createElement('span');
                span.className = 'char';
                span.textContent = ch;
                span.style.animationDelay = (charIndex * 0.06) + 's';
                logoText.appendChild(span);
                charIndex++;
            }
            // preserve spaces
            if (text.endsWith(' ')) {
                const sp = document.createElement('span');
                sp.className = 'char';
                sp.textContent = ' ';
                sp.style.animationDelay = (charIndex * 0.06) + 's';
                logoText.appendChild(sp);
                charIndex++;
            }
        } else if (part.type === 'node') {
            // For element nodes, split their text content into chars but preserve the element (e.g., colored span)
            const el = part.value;
            const textInside = el.textContent || '';
            const wrapper = document.createElement(el.tagName.toLowerCase());
            // copy attributes (class, style)
            for (let i = 0; i < el.attributes.length; i++) {
                const attr = el.attributes[i];
                wrapper.setAttribute(attr.name, attr.value);
            }
            // append chars into the wrapper
            for (let i = 0; i < textInside.length; i++) {
                const ch = textInside[i];
                const span = document.createElement('span');
                span.className = 'char';
                span.textContent = ch;
                span.style.animationDelay = (charIndex * 0.06) + 's';
                wrapper.appendChild(span);
                charIndex++;
            }
            logoText.appendChild(wrapper);
        }
    });

    // Pause animation on hover (optional)
    logoText.addEventListener('mouseenter', () => {
        logoText.querySelectorAll('.char').forEach(el => el.style.animationPlayState = 'paused');
    });
    logoText.addEventListener('mouseleave', () => {
        logoText.querySelectorAll('.char').forEach(el => el.style.animationPlayState = 'running');
    });
});
