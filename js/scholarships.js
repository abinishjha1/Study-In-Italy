(function () {
  const search = document.getElementById('schSearch');
  const chipContainer = document.querySelector('.chips');
  const cards = Array.from(document.querySelectorAll('.sch-card'));
  if (!search || !chipContainer || !cards.length) return;

  const hay = new Map(cards.map((c) => [
    c,
    (
      (c.querySelector('h2')?.textContent || '') + ' ' +
      (c.getAttribute('data-tags') || '')
    ).toLowerCase()
  ]));

  let activeType = 'all';

  function applyFilters() {
    const q = search.value.trim().toLowerCase();
    cards.forEach((c) => {
      const typeOk = activeType === 'all' || (c.getAttribute('data-type') === activeType);
      const textOk = !q || hay.get(c).includes(q);
      c.style.display = (typeOk && textOk) ? '' : 'none';
    });
  }

  search.addEventListener('input', applyFilters);

  chipContainer.addEventListener('click', (e) => {
    const btn = e.target.closest('.chip');
    if (!btn) return;
    activeType = btn.getAttribute('data-type') || 'all';
    chipContainer.querySelectorAll('.chip').forEach((c) => c.classList.remove('active'));
    btn.classList.add('active');
    applyFilters();
  });
})();


