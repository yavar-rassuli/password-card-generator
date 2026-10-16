// Characters that can appear on the card.
// Similar looking characters (0 O o, 1 l I) are left out, so the card is easy to read.
const CHARACTERS =
  'ABCDEFGHJKLMNPQRSTUVWXYZ' +
  'abcdefghijkmnpqrstuvwxyz' +
  '23456789' +
  '!#$%&*+-=?@';

const LETTERS = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
const MAX_ROWS = 25;

const form = document.getElementById('settings');
const columnsSelect = document.getElementById('columns');
const rowsInput = document.getElementById('rows');
const card = document.getElementById('card');
const printButton = document.getElementById('print');

// Secure random number from 0 to max - 1 (without "modulo bias")
function randomIndex(max) {
  const limit = Math.floor(2 ** 32 / max) * max;
  const buffer = new Uint32Array(1);
  do {
    crypto.getRandomValues(buffer);
  } while (buffer[0] >= limit);
  return buffer[0] % max;
}

function randomCharacter() {
  return CHARACTERS[randomIndex(CHARACTERS.length)];
}

// Keep a number between min and max
function clamp(value, min, max) {
  return Math.min(Math.max(value, min), max);
}

function createCell(tag, text) {
  const cell = document.createElement(tag);
  cell.textContent = text;
  return cell;
}

// Fill the "Columns" select with A to Z
function fillColumnSelect() {
  for (const letter of LETTERS) {
    const option = document.createElement('option');
    option.value = letter;
    option.textContent = letter;
    columnsSelect.append(option);
  }
  columnsSelect.value = 'L';
}

function generateCard() {
  const columnCount = LETTERS.indexOf(columnsSelect.value) + 1;
  const rowCount = clamp(Number.parseInt(rowsInput.value, 10) || 10, 1, MAX_ROWS);
  rowsInput.value = rowCount;

  // Header row: empty corner, then A, B, C ...
  const thead = document.createElement('thead');
  const headRow = thead.insertRow();
  headRow.append(createCell('th', ''));
  for (const letter of LETTERS.slice(0, columnCount)) {
    headRow.append(createCell('th', letter));
  }

  // One row per number, filled with random characters
  const tbody = document.createElement('tbody');
  for (let row = 1; row <= rowCount; row++) {
    const tr = tbody.insertRow();
    tr.append(createCell('th', row));
    for (let column = 0; column < columnCount; column++) {
      tr.append(createCell('td', randomCharacter()));
    }
  }

  card.replaceChildren(thead, tbody);
}

form.addEventListener('submit', (event) => {
  event.preventDefault();
  generateCard();
});

printButton.addEventListener('click', () => window.print());

fillColumnSelect();
generateCard();
