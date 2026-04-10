function fizzBuzzExtended(from = 1, to = 100) {
  const start = Number(from);
  const end = Number(to);

  if (!Number.isFinite(start) || !Number.isFinite(end)) {
    throw new TypeError("from/to must be finite numbers");
  }

  const result = [];

  for (let i = start; i <= end; i += 1) {
    if (i <= 0) continue;

    let out = "";
    if (i % 3 === 0) out += "Fizz";
    if (i % 5 === 0) out += "Buzz";
    result.push(out || String(i));
  }

  return result;
}

if (require.main === module) {
  console.log(fizzBuzzExtended(1, 100).join("\n"));
}

module.exports = { fizzBuzzExtended };

