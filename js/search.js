(function () {
  const input = document.getElementById('uniSearch') || document.getElementById('uniSearchTop');
  const container = document.getElementById('uniResults');
  if (!input || !container) return;

  const getHaystack = (card) => [
    card.getAttribute('data-name') || '',
    card.getAttribute('data-city') || '',
    card.getAttribute('data-courses') || ''
  ].join(' ').toLowerCase();

  const cards = Array.from(container.querySelectorAll('.uni-card'));
  const map = new Map(cards.map((c) => [c, getHaystack(c)]));

  const url = new URL(window.location.href);
  const initialQuery = url.searchParams.get('q');
  if (initialQuery) input.value = initialQuery;

  function onSearch() {
    const q = input.value.trim().toLowerCase();
    if (!q) {
      cards.forEach((c) => (c.style.display = ''));
      return;
    }
    cards.forEach((c) => {
      const ok = map.get(c).includes(q);
      c.style.display = ok ? '' : 'none';
    });
  }

  input.addEventListener('input', onSearch);
  onSearch();
})();


